<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMataKuliahRequest;
use App\Http\Requests\UpdateMataKuliahRequest;
use App\Http\Resources\Admin\MataKuliahResource;
use App\Models\Jurusan;
use App\Models\MataKuliah;
use Shuchkin\SimpleXLSX;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MataKuliahApiController extends Controller {
    public function index() {
        abort_if ( Gate::denies( 'mata_kuliah_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        return new MataKuliahResource( MataKuliah::with( [ 'jurusan' ] )->advancedFilter() );
    }

    public function store( StoreMataKuliahRequest $request ) {
        // if ( $request->input( 'data_mtk' ) != null ) {
        //     $request->input( 'id_mtk', 11111111 );
        //     $request->input( 'nama_mtk', 'qwerty' );
        // }
        $mataKuliah = MataKuliah::create( $request->validated() );

        if ( $media = $request->input( 'data_mtk', [] ) ) {
            Media::whereIn( 'id', data_get( $media, '*.id' ) )
            ->where( 'model_id', 0 )
            ->update( [ 'model_id' => $mataKuliah->id ] );
        }

        // var_dump( $log );
        if ( $request->input( 'data_mtk' ) != null ) {

            $data_log = public_path() . '/storage/' . $request->input( 'data_mtk' )[ 0 ][ 'id' ] . '/' . $request->input( 'data_mtk' )[ 0 ][ 'file_name' ];
            if ( $xlsx = SimpleXLSX::parse( $data_log ) ) {
                $r = $xlsx->rows();

                // return var_dump( $r );

            } else {
                echo SimpleXLSX::parseError();
            }
            if ( isset( $r ) ) {
                foreach ( $r as $d ) {
                    if ( is_string( $d[ 0 ] ) == FALSE ) {
                        echo $d[ 0 ].' angka .. | ';
                        $cek = MataKuliah::where( 'id_mtk', $d[ 0 ] )->get();
                        // $cek = MataKuliah::where( 'nama_mtk', 'Bhs Arab' )->get()[ 0 ];
                        // var_dump( $cek );
                        // var_dump( $d[ 2 ] );
                        // die;

                        //   $d[ 2 ];
                        // var_dump( 'cek'.$cek );
                        if($cek->isEmpty()){
                            echo 'tidak ada';
                        }else{
                            echo 'ada |';
                        }
                        // die;
                        // var_dump( $d[ 0 ] );
                        if ( $cek->isEmpty() ) {
                            $nilai = array(
                                 'id_mtk' => $d[ 0 ] ,
                                 'nama_mtk' => $d[ 1 ] ,
                                 'jurusan_id' => Jurusan::where( 'nama_jurusan', $d[ 2 ] )->get()[ 0 ]->id ,
                                 'jumlah_sks' => $d[ 3 ] ,
                                'data_mtk' => [] 
                            );
                            $buat = MataKuliah::create(
                                $nilai
                            );
                            var_dump( $nilai );
                            var_dump('buat'. $buat );
                        } else
                        if ( $cek->isNotEmpty() ) {
                            // var_dump( $cek );
                            // die;
                            // $cek->id_mtk == $d[ 0 ]
                            // echo 'sama';
                            $jj = Jurusan::where( 'nama_jurusan', $d[ 2 ] )->get()[ 0 ]->id;
                            // echo $j->id;
                            // $nilai = array( [ 'nama_mtk' => $d[ 1 ] ],
                            // [ 'jurusan_id' => [ 'id' => Jurusan::where( 'nama_jurusan', $d[ 2 ] )->first()->id ] ],
                            // [ 'jumlah_sks' => $d[ 3 ] ] );
                            // var_dump( $jj );
                            $up = MataKuliah::where( 'id_mtk', $d[ 0 ] )->update(
                                // $nilai
                                [ 'nama_mtk' => $d[ 1 ] ],
                                [ 'jurusan_id' => $jj ],
                                [ 'jumlah_sks' => $d[ 3 ] ]
                            );
                            // var_dump('jj', $jj );
                            // var_dump('up'. $up );
                        } else {
                            echo "wropng";
                        }
                    }
                }
            }
        }

        $data = MataKuliah::where( 'jumlah_sks', null )
        ->get();
        foreach ( $data as $d ) {
            // $d->delete();
            $d->forceDelete();
        }

        return ( new MataKuliahResource( $mataKuliah ) )
        ->response()
        ->setStatusCode( Response::HTTP_CREATED );
    }

    public function create() {
        abort_if ( Gate::denies( 'mata_kuliah_create' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        return response( [
            'meta' => [
                'jurusan' => Jurusan::get( [ 'id', 'nama_jurusan' ] ),
            ],
        ] );
    }

    public function show( MataKuliah $mataKuliah ) {
        abort_if ( Gate::denies( 'mata_kuliah_show' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        return new MataKuliahResource( $mataKuliah->load( [ 'jurusan' ] ) );
    }

    public function update( UpdateMataKuliahRequest $request, MataKuliah $mataKuliah ) {
        $mataKuliah->update( $request->validated() );
        var_dump( $request->input( 'jurusan_id' ) );
        $mataKuliah->updateMedia( $request->input( 'data_mtk', [] ), 'mata_kuliah_data_mtk' );

        return ( new MataKuliahResource( $mataKuliah ) )
        ->response()
        ->setStatusCode( Response::HTTP_ACCEPTED );
    }

    public function edit( MataKuliah $mataKuliah ) {
        abort_if ( Gate::denies( 'mata_kuliah_edit' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        return response( [
            'data' => new MataKuliahResource( $mataKuliah->load( [ 'jurusan' ] ) ),
            'meta' => [
                'jurusan' => Jurusan::get( [ 'id', 'nama_jurusan' ] ),
            ],
        ] );
    }

    public function destroy( MataKuliah $mataKuliah ) {
        abort_if ( Gate::denies( 'mata_kuliah_delete' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        $mataKuliah->delete();

        return response( null, Response::HTTP_NO_CONTENT );
    }

    public function storeMedia( Request $request ) {
        abort_if ( Gate::none( [ 'mata_kuliah_create', 'mata_kuliah_edit' ] ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        if ( $request->has( 'size' ) ) {
            $this->validate( $request, [
                'file' => 'max:' . $request->input( 'size' ) * 1024,
            ] );
        }

        $model         = new MataKuliah();
        $model->id     = $request->input( 'model_id', 0 );
        $model->exists = true;
        $media         = $model->addMediaFromRequest( 'file' )->toMediaCollection( $request->input( 'collection_name' ) );

        return response()->json( $media, Response::HTTP_CREATED );
    }
}
