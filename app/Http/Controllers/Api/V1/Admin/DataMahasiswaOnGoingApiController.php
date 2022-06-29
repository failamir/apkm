<?php

// namespace App\Http\Controllers\Api\V1\Admin;

// use App\Http\Controllers\Controller;
// use App\Http\Requests\StoreDataMahasiswaOnGoingRequest;
// use App\Http\Requests\UpdateDataMahasiswaOnGoingRequest;
// use App\Http\Resources\Admin\DataMahasiswaOnGoingResource;
// use App\Models\DataMahasiswa;
// use App\Models\DataMahasiswaOnGoing;
// use App\Models\MataKuliah;
// use Gate;
// use Illuminate\Http\Request;
// use Illuminate\Http\Response;
// use Spatie\MediaLibrary\MediaCollections\Models\Media;

// class DataMahasiswaOnGoingApiController extends Controller
// {
//     public function index()
//     {
//         abort_if(Gate::denies('data_mahasiswa_on_going_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//         return new DataMahasiswaOnGoingResource(DataMahasiswaOnGoing::with(['dataHistory', 'mataKuliah'])->advancedFilter());
//     }

//     public function store(StoreDataMahasiswaOnGoingRequest $request)
//     {
//         $dataMahasiswaOnGoing = DataMahasiswaOnGoing::create($request->validated());

//         if ($media = $request->input('data_mahasiswa', [])) {
//             Media::whereIn('id', data_get($media, '*.id'))
//                 ->where('model_id', 0)
//                 ->update(['model_id' => $dataMahasiswaOnGoing->id]);
//         }

//         return (new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing))
//             ->response()
//             ->setStatusCode(Response::HTTP_CREATED);
//     }

//     public function create()
//     {
//         abort_if(Gate::denies('data_mahasiswa_on_going_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//         return response([
//             'meta' => [
//                 'data_history' => DataMahasiswa::get(['id', 'nama']),
//                 'mata_kuliah'  => MataKuliah::get(['id', 'nama_mtk']),
//             ],
//         ]);
//     }

//     public function show(DataMahasiswaOnGoing $dataMahasiswaOnGoing)
//     {
//         abort_if(Gate::denies('data_mahasiswa_on_going_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//         return new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing->load(['dataHistory', 'mataKuliah']));
//     }

//     public function update(UpdateDataMahasiswaOnGoingRequest $request, DataMahasiswaOnGoing $dataMahasiswaOnGoing)
//     {
//         $dataMahasiswaOnGoing->update($request->validated());

//         $dataMahasiswaOnGoing->updateMedia($request->input('data_mahasiswa', []), 'data_mahasiswa_on_going_data_mahasiswa');

//         return (new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing))
//             ->response()
//             ->setStatusCode(Response::HTTP_ACCEPTED);
//     }

//     public function edit(DataMahasiswaOnGoing $dataMahasiswaOnGoing)
//     {
//         abort_if(Gate::denies('data_mahasiswa_on_going_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//         return response([
//             'data' => new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing->load(['dataHistory', 'mataKuliah'])),
//             'meta' => [
//                 'data_history' => DataMahasiswa::get(['id', 'nama']),
//                 'mata_kuliah'  => MataKuliah::get(['id', 'nama_mtk']),
//             ],
//         ]);
//     }

//     public function destroy(DataMahasiswaOnGoing $dataMahasiswaOnGoing)
//     {
//         abort_if(Gate::denies('data_mahasiswa_on_going_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//         $dataMahasiswaOnGoing->delete();

//         return response(null, Response::HTTP_NO_CONTENT);
//     }

//     public function storeMedia(Request $request)
//     {
//         abort_if(Gate::none(['data_mahasiswa_on_going_create', 'data_mahasiswa_on_going_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

//         if ($request->has('size')) {
//             $this->validate($request, [
//                 'file' => 'max:' . $request->input('size') * 1024,
//             ]);
//         }

//         $model         = new DataMahasiswaOnGoing();
//         $model->id     = $request->input('model_id', 0);
//         $model->exists = true;
//         $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

//         return response()->json($media, Response::HTTP_CREATED);
//     }
// }

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataMahasiswaOnGoingRequest;
use App\Http\Requests\UpdateDataMahasiswaOnGoingRequest;
use App\Http\Resources\Admin\DataMahasiswaOnGoingResource;
use App\Models\DataMahasiswaOnGoing;
use App\Models\DataMahasiswa;
use App\Models\MataKuliah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DataMahasiswaOnGoingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_mahasiswa_on_going_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $DataMahasiswaOnGoingResource['andri'] = 'cantik';
        return new DataMahasiswaOnGoingResource(DataMahasiswaOnGoing::with(['dataHistory', 'mataKuliah'])->advancedFilter());
    }

    public function store(StoreDataMahasiswaOnGoingRequest $request)
    {
        $dataMahasiswaOnGoing = DataMahasiswaOnGoing::create(array_merge(
            $request->validated(),
            ['lulus' => 123],
            ['tidak_lulus' => 123],
            ['active' => 123],
            ['observers' => 123],
            ['accuracy' => 123],
            ['recall_lulus' => 123],
            ['recall_tidak_lulus' => 123],
            ['precision_lulus' => 123],
            ['precision_tidak_lulus' => 123],
            ['hasil_prediksi' => 'url'],
            ['data_history_id' => $request->input('data_history_id')],
            ['prediksi_tidak_lulus' => 123],
            
        ));

        if ($media = $request->input('data_mahasiswa', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $dataMahasiswaOnGoing->id]);
        }
        // $dataMahasiswaOnGoing->andri = 'cantik';
        // $a = $request->input('batas_nilai');
        // $a = '../../../../public/storage/'.$request->input('data_mahasiswa')[0]["id"].'/'.$request->input('data_mahasiswa')[0]["file_name"];
        // var_dump($a);
        // var_dump($b);
        var_dump($request->input('data_history_id'));
        $andri = DataMahasiswa::find($request->input('data_history_id'));
        var_dump($andri);
        // die;
        $a = $andri->batas_nilai;
        // $c = public_path().'/storage/'.$request->input('data_mahasiswa')[0]["id"].'/'.$request->input('data_mahasiswa')[0]["file_name"];
        // $a = $request->input('data_mahasiswa')[0]["file_name"];

        // $batas = '40';
        $b = $andri->location;
        var_dump($b);
        $c = public_path() . '/storage/' . $request->input('data_mahasiswa')[0]["id"] . '/' . $request->input('data_mahasiswa')[0]["file_name"];
        var_dump($c);
        $date = date('dmYhsi');
        var_dump($date);
        $u = $date . 'HasilPrediksi.xlsx';
        var_dump($u);
        // $process = new Process(["python3", "Proses.py '$a' '$b' '$date'"]);
        // $process = new Process(["python3", "ProsesH.py '$a' '$b' '$date'"]);
        // $process->run();

        // executes after the command finishes
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }

        // echo $process->getOutput();
        $py = env('PYPATH',);
        $andri = exec("'$py' ProsesOngoing.py '$a' '$b' '$c' '$date'  2>&1", $out, $ret);
        // $andri = exec("python3 ../../../../Proses.py '$a' '$date'", $out, $ret);
        var_dump($andri);
        $text = str_replace("'", '"', $andri);
        $andri = json_decode($text);

        $dataMahasiswaOnGoing->update(array_merge(
            $request->validated(),
            ['lulus' => $andri->KeseluruhanMahasiswaDataOngoing[0]],
            ['tidak_lulus' => $andri->KeseluruhanMahasiswaDataOngoing[1]],
            ['prediksi_tidak_lulus' => $andri->KeseluruhanMahasiswaDataOngoing[2]],
            ['active' => $andri->MahasiswaActivedanObserversDataOngoing[0]],
            ['observers' => $andri->MahasiswaActivedanObserversDataOngoing[1]],
            ['accuracy' => $andri->Accuracy],
            ['recall_lulus' => $andri->RecallLulus],
            ['recall_tidak_lulus' => $andri->Recalltidak_lulus],
            ['precision_lulus' => $andri->PrecisionLulus],
            ['precision_tidak_lulus' => $andri->Precisiontidak_lulus],
            ['hasil_prediksi' => $u],
            ['data_history_id' => $request->input('data_history_id')],
        ));
        return (new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('data_mahasiswa_on_going_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'data_history' => DataMahasiswa::get(['id', 'nama']),
                'mata_kuliah'  => MataKuliah::get(['id', 'nama_mtk']),
            ],
        ]);
    }

    public function show(DataMahasiswaOnGoing $dataMahasiswaOnGoing)
    {
        abort_if(Gate::denies('data_mahasiswa_on_going_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing->load(['dataHistory', 'mataKuliah']));
    }

    public function proses(DataMahasiswaOnGoing $dataMahasiswa)
    {
        abort_if(Gate::denies('data_mahasiswa_on_going_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $d = new stdClass();
        // $d->andri = 'cantik';
        // array_push($dataDummy,$d);
        $dataMahasiswa->andri = 'cantik';
        return new DataMahasiswaOnGoingResource($dataMahasiswa);
    }

    public function update(UpdateDataMahasiswaOnGoingRequest $request, DataMahasiswaOnGoing $dataMahasiswaOnGoing)
    {
        $dataMahasiswaOnGoing->update($request->validated());

        $dataMahasiswaOnGoing->updateMedia($request->input('data_mahasiswa', []), 'data_mahasiswa_on_going_data_mahasiswa');
        $dataMahasiswaOnGoing->andri = 'cantik';
        return (new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(DataMahasiswaOnGoing $dataMahasiswaOnGoing)
    {
        abort_if(Gate::denies('data_mahasiswa_on_going_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing),
            'meta' => [
                'data_history' => DataMahasiswa::get(['id', 'nama']),
                'mata_kuliah'  => MataKuliah::get(['id', 'nama_mtk']),
            ],
        ]);
    }

    public function destroy(DataMahasiswaOnGoing $dataMahasiswaOnGoing)
    {
        abort_if(Gate::denies('data_mahasiswa_on_going_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataMahasiswaOnGoing->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['data_mahasiswa_on_going_create', 'data_mahasiswa_on_going_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new DataMahasiswaOnGoing();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}

