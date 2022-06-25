<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePreparationDataRequest;
use App\Http\Requests\UpdatePreparationDataRequest;
use App\Http\Resources\Admin\PreparationDataResource;
use App\Models\PreparationData;
use App\Models\DataPreparation;
use Gate;
use Shuchkin\SimpleXLSX;
use Shuchkin\SimpleXLSXGen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PreparationDataApiController extends Controller {
    public function index() {
        abort_if ( Gate::denies( 'preparation_data_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        return new PreparationDataResource( PreparationData::advancedFilter() );
    }

    public function store( StorePreparationDataRequest $request ) {
        $preparationData = PreparationData::create( $request->validated() );

        if ( $media = $request->input( 'data_log', [] ) ) {
            Media::whereIn( 'id', data_get( $media, '*.id' ) )
            ->where( 'model_id', 0 )
            ->update( [ 'model_id' => $preparationData->id ] );
        }

        $data_log = public_path() . '/storage/' . $request->input( 'data_log' )[ 0 ][ 'id' ] . '/' . $request->input( 'data_log' )[ 0 ][ 'file_name' ];
        // var_dump( $log );
        if ( $request->input( 'data_log' ) != null ) {
            if ( $xlsx = SimpleXLSX::parse( $data_log ) ) {
                $r = $xlsx->rows();

                // return print_r( $r );

            } else {
                echo SimpleXLSX::parseError();
            }
            if ( isset( $r ) ) {
                foreach ( $r as $d ) {
                    // echo $d[ 2 ];
                    // [ 0 ] => Time
                    // [ 1 ] => Timestamp
                    // [ 2 ] => User full name
                    // [ 3 ] => Affected user
                    // [ 4 ] => Event context
                    // [ 5 ] => Component
                    // [ 6 ] => Event name
                    // [ 7 ] => IP address
                    $cek = DataPreparation::where( 'nama', $d[ 2 ] )->first();
                    // var_dump( $cek );
                    if ( $cek == null ) {
                        $buat = PreparationData::create(
                            [ 'nama' => $d[ 2 ] ],
                            [ 'akses_file' => 1 ],
                            [ 'akses_video' => 1 ],
                            [ 'akses_forum' => 1 ],
                            [ 'kuis_1' => 1 ],
                            [ 'kuis_2' => 1 ],
                            [ 'tugas_1' => 1 ],
                            [ 'tugas_2' => 1 ],
                            [ 'nilai_akhir' => 1 ],
                            [ 'status_1' => 1 ],
                            [ 'status_2' => 1 ],
                            [ 'status_3' => 1 ],
                            [ 'status_3' => 1 ],
                            [ 'temp_nilai' => 1 ],
                            [ 'temp_log' => 1 ],
                        );
                    } else if ( $cek->nama == $d[ 2 ] ) {
                        if ( $d[ 5 ] == 'File' ) {
                            DataPreparation::where( 'nama', $d[ 2 ] )->update(
                                [ 'akses_file' => $cek->akses_file + 1 ],

                            );
                        }
                        if ( $d[ 5 ] == 'Forum' ) {
                            DataPreparation::where( 'nama', $d[ 2 ] )->update(
                                [ 'akses_forum' => $cek->akses_forum + 1 ],

                            );
                        }
                        if ( $d[ 5 ] == 'URL' ) {
                            DataPreparation::where( 'nama', $d[ 2 ] )->update(
                                [ 'akses_video' => $cek->akses_video + 1 ],

                            );
                        }
                    } else {

                    }
                }
            }
        }

        if ( $media = $request->input( 'data_nilai', [] ) ) {
            Media::whereIn( 'id', data_get( $media, '*.id' ) )
            ->where( 'model_id', 0 )
            ->update( [ 'model_id' => $preparationData->id ] );
        }

        if ( $request->input( 'data_nilai' ) != null ) {
            $data_nilai = public_path() . '/storage/' . $request->input( 'data_nilai' )[ 0 ][ 'id' ] . '/' . $request->input( 'data_nilai' )[ 0 ][ 'file_name' ];
            // var_dump( $data_nilai );
            
                if ( $xlsx = SimpleXLSX::parse( $data_nilai ) ) {
                    $r = $xlsx->rows();

                    // return print_r( $r );

                } else {
                    echo SimpleXLSX::parseError();
                }
                if ( isset( $r ) ) {
                    foreach ( $r as $d ) {
                        // echo $d[ 2 ];
                        // [ 0 ] => Time
                        // [ 1 ] => Timestamp
                        // [ 2 ] => User full name
                        // [ 3 ] => Affected user
                        // [ 4 ] => Event context
                        // [ 5 ] => Component
                        // [ 6 ] => Event name
                        // [ 7 ] => IP address
                        $cek = DataPreparation::where( 'nama', $d[ 0 ] )->first();
                        // var_dump( $cek );
                        if ( $cek == null ) {
                            $buat = DataPreparation::create(
                                [ 'nama' => $d[ 0 ] ],
                                [ 'akses_file' => 1 ],
                                [ 'akses_video' => 1 ],
                                [ 'akses_forum' => 1 ],
                                [ 'kuis_1' => 1 ],
                                [ 'kuis_2' => 1 ],
                                [ 'tugas_1' => 1 ],
                                [ 'tugas_2' => 1 ],
                                [ 'nilai_akhir' => 1 ],
                                [ 'status_1' => 1 ],
                                [ 'status_2' => 1 ],
                                [ 'status_3' => 1 ],
                            );
                        } else if ( $cek->nama == $d[ 0 ] ) {
                            if ( $d[ 8 ] > 0 ) {
                                $s1 = 'Lulus';
                            } else {
                                $s1 = 'Tidak Lulus';
                            }
                            if ( $d[ 8 ] > 50 ) {
                                $s2 = 'Lulus';
                            } else {
                                $s2 = 'Tidak Lulus';
                            }
                            if ( $d[ 8 ] > 55 ) {
                                $s3 = 'Lulus';
                            } else {
                                $s3 = 'Tidak Lulus';
                            }
                            DataPreparation::where( 'nama', $d[ 0 ] )->update(
                                [ 'kuis_1' => $d[ 1 ] ],
                                [ 'kuis_2' => $d[ 3 ] ],
                                [ 'tugas_1' => $d[ 2 ] ],
                                [ 'tugas_2' => $d[ 4 ] ],
                                [ 'nilai_akhir' => $d[ 8 ] ],
                                [ 'status_1' => $s1 ],
                                [ 'status_2' => $s2 ],
                                [ 'status_3' => $s3 ],
                            );
                        }
                    }
                } else {

                }
            
        }

        // if ( $media = $request->input( 'data_nilai', [] ) ) {
        //     Media::whereIn( 'id', data_get( $media, '*.id' ) )
        //         ->where( 'model_id', 0 )
        //         ->update( [ 'model_id' => $preparationData->id ] );
        // }

        $books = [
            [ 'Nama', 'Akses_File', 'Akses_Video', 'Akses_Forum', 'Kuis_1', 'Kuis_2', 'Tugas_1', 'Tugas_2', 'Nilai_Akhir', 'Status1', 'Status2', 'Status3' ],
        ];
        $data = DataPreparation::where( 'temp_log', 1)->get();
        foreach($data as $d){
            // $andri = array();
            $andri [] = $d->nama;
            $andri [] = $d->akses_file;
            $andri [] = $d->akses_video;
            $andri [] = $d->akses_forum;
            $andri [] = $d->kuis_1;
            $andri [] = $d->kuis_2;
            $andri [] = $d->tugas_1;
            $andri [] = $d->tugas_2;
            $andri [] = $d->nilai_akhir;
            $andri [] = $d->status1;
            $andri [] = $d->status2;
            $andri [] = $d->status3;
            array_merge($andri, $books);
        }
        $xlsx = Shuchkin\SimpleXLSXGen::fromArray( $books );
        $hasil = $xlsx->saveAs( 'books.xlsx' );
        // or downloadAs( 'books.xlsx' ) or $xlsx_content = ( string ) $xlsx

        if ( $media = $request->input( 'data_hasil', $hasil ) ) {
            Media::whereIn( 'id', data_get( $media, '*.id' ) )
            ->where( 'model_id', 0 )
            ->update( [ 'model_id' => $preparationData->id ] );
        }

        return ( new PreparationDataResource( $preparationData ) )
        ->response()
        ->setStatusCode( Response::HTTP_CREATED );
    }

    public function create() {
        abort_if ( Gate::denies( 'preparation_data_create' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        return response( [
            'meta' => [],
        ] );
    }

    public function show( PreparationData $preparationData ) {
        abort_if ( Gate::denies( 'preparation_data_show' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        return new PreparationDataResource( $preparationData );
    }

    public function update( UpdatePreparationDataRequest $request, PreparationData $preparationData ) {
        $preparationData->update( $request->validated() );

        $preparationData->updateMedia( $request->input( 'data_log', [] ), 'preparation_data_data_log' );
        $preparationData->updateMedia( $request->input( 'data_nilai', [] ), 'preparation_data_data_nilai' );
        $preparationData->updateMedia( $request->input( 'data_hasil', [] ), 'preparation_data_data_hasil' );

        return ( new PreparationDataResource( $preparationData ) )
        ->response()
        ->setStatusCode( Response::HTTP_ACCEPTED );
    }

    public function edit( PreparationData $preparationData ) {
        abort_if ( Gate::denies( 'preparation_data_edit' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        return response( [
            'data' => new PreparationDataResource( $preparationData ),
            'meta' => [],
        ] );
    }

    public function destroy( PreparationData $preparationData ) {
        abort_if ( Gate::denies( 'preparation_data_delete' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        $preparationData->delete();

        return response( null, Response::HTTP_NO_CONTENT );
    }

    public function storeMedia( Request $request ) {
        abort_if ( Gate::none( [ 'preparation_data_create', 'preparation_data_edit' ] ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

        if ( $request->has( 'size' ) ) {
            $this->validate( $request, [
                'file' => 'max:' . $request->input( 'size' ) * 1024,
            ] );
        }

        $model         = new PreparationData();
        $model->id     = $request->input( 'model_id', 0 );
        $model->exists = true;
        $media         = $model->addMediaFromRequest( 'file' )->toMediaCollection( $request->input( 'collection_name' ) );

        return response()->json( $media, Response::HTTP_CREATED );
    }
}
