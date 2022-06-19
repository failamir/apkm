<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataMahasiswaOnGoingRequest;
use App\Http\Requests\UpdateDataMahasiswaOnGoingRequest;
use App\Http\Resources\Admin\DataMahasiswaOnGoingResource;
use App\Models\DataMahasiswa;
use App\Models\DataMahasiswaOnGoing;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DataMahasiswaOnGoingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_mahasiswa_on_going_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataMahasiswaOnGoingResource(DataMahasiswaOnGoing::with(['dataHistory'])->advancedFilter());
    }

    public function store(StoreDataMahasiswaOnGoingRequest $request)
    {
        $dataMahasiswaOnGoing = DataMahasiswaOnGoing::create(array_merge($request->validated(),
        ['Lulus' => 123],
         ['TidakLulus' => 123],
         ['Active' => 123],
         ['Observers' => 123],
         ['Accuracy' => 123],
         ['RecallLulus' => 123],
         ['RecallTidakLulus' => 123],
         ['PrecisionTidakLulus' => 123],
         ['PrecisionLulus' => 123],
         ['hasil_prediksi' => 'url'],
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
        $a = '40';
        // $c = public_path().'/storage/'.$request->input('data_mahasiswa')[0]["id"].'/'.$request->input('data_mahasiswa')[0]["file_name"];
        // $a = $request->input('data_mahasiswa')[0]["file_name"];
        
        // $batas = '40';
        $b = public_path().'/storage/'.'2/Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx';
        var_dump($b);
        $c = public_path().'/storage/'.$request->input('data_mahasiswa')[0]["id"].'/'.$request->input('data_mahasiswa')[0]["file_name"];
        var_dump($c);
        $date = date('dmYhsi');
        var_dump($date);
        $u = $date.'HasilPrediksi.xlsx';
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
        $andri=exec("'$py' ProsesOngoing.py '$a' '$b' '$c' '$date'  2>&1", $out, $ret);
        // $andri = exec("python3 ../../../../Proses.py '$a' '$date'", $out, $ret);
        var_dump($andri);
        $text = str_replace("'", '"', $andri);
        $andri = json_decode($text);
            
        $dataMahasiswaOnGoing->update(array_merge($request->validated(),
         ['Lulus' => $andri->LulusdanTidakLulus[0]],
         ['TidakLulus' => $andri->LulusdanTidakLulus[1]],
         ['Active' => $andri->MahasiswaActivedanObservers[0]],
         ['Observers' => $andri->MahasiswaActivedanObservers[1]],
         ['Accuracy' => $andri->Accuracy],
         ['RecallLulus' => $andri->RecallLulus],
         ['RecallTidakLulus' => $andri->RecallTidakLulus],
         ['PrecisionTidakLulus' => $andri->PrecisionTidakLulus],
         ['PrecisionLulus' => $andri->PrecisionLulus],
         ['hasil_prediksi' => $u],
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
            ],
        ]);
    }

    public function show(DataMahasiswaOnGoing $dataMahasiswaOnGoing)
    {
        abort_if(Gate::denies('data_mahasiswa_on_going_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing->load(['dataHistory']));
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
            'data' => new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing->load(['dataHistory'])),
            'meta' => [
                'data_history' => DataMahasiswa::get(['id', 'nama']),
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
