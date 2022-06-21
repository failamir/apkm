<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataMahasiswaRequest;
use App\Http\Requests\UpdateDataMahasiswaRequest;
use App\Http\Resources\Admin\DataMahasiswaResource;
use App\Models\DataMahasiswa;
use App\Models\MataKuliah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DataMahasiswaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_mahasiswa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataMahasiswaResource(DataMahasiswa::with(['mataKuliah'])->advancedFilter());
    }

    public function store(StoreDataMahasiswaRequest $request)
    {
        $dataMahasiswa = DataMahasiswa::create($request->validated());

        if ($media = $request->input('data_mahasiswa', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $dataMahasiswa->id]);
        }

        // $dataMahasiswa->andri = 'cantik';
        $a = $request->input('batas_nilai');
        $b = public_path() . '/storage/' . $request->input('data_mahasiswa')[0]["id"] . '/' . $request->input('data_mahasiswa')[0]["file_name"];
        // $b = $request->input('data_mahasiswa')[0]["file_name"];
        // var_dump(base_path());
        // var_dump(storage_path());
        $date = date('dmYhsi');
         // var_dump(app_path());
        // $process = new Process(["python3", "Proses.py '$a' '$b' '$date'"]);
        // $process = new Process(["python3", "ProsesH.py '$a' '$b' '$date'"]);
        // $process->run();

        // executes after the command finishes
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }

        // echo $process->getOutput();
        $py = env('PYPATH',);
        $andri = exec("'$py' Proses.py '$a' '$b' '$date'  2>&1", $out, $ret);
        // $andri = exec("python3 ../../../../Proses.py '$a' '$date'", $out, $ret);
        var_dump($andri);
        $text = str_replace("'", '"', $andri);
        $andri = json_decode($text);

        // $dataMahasiswa = DataMahasiswa::whereId($dataMahasiswa->id)->update(
        //  ['LulusdanTidakLulus' => 22],
        //  ['MahasiswaActivedanObservers' => 1223],
        //  ['Accuracy' => 1123],
        //  ['RecallLulus' => 1223],
        //  ['RecallTidakLulus' => 2123],
        //  ['PrecisionTidakLulus' => 123],
        //  ['PrecisionLulus' => 123]);
        $dataMahasiswa->update(array_merge(
            $request->validated(),
            ['lulus' => $andri->LulusdanTidakLulus[0]],
            ['tidaklulus' => $andri->LulusdanTidakLulus[1]],
            ['active' => $andri->MahasiswaActivedanObservers[0]],
            ['observers' => $andri->MahasiswaActivedanObservers[1]],
            ['accuracy' => $andri->Accuracy],
            ['recall_lulus' => $andri->RecallLulus],
            ['recall_tidak_lulus' => $andri->RecallTidakLulus],
            ['precision_lulus' => $andri->PrecisionLulus],
            ['precision_tidak_lulus' => $andri->PrecisionTidakLulus],
            ['location' => $b]
        ));
        return (new DataMahasiswaResource($dataMahasiswa))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('data_mahasiswa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'mata_kuliah' => MataKuliah::get(['id', 'id_mtk']),
            ],
        ]);
    }

    public function show(DataMahasiswa $dataMahasiswa)
    {
        abort_if(Gate::denies('data_mahasiswa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataMahasiswaResource($dataMahasiswa->load(['mataKuliah']));
    }

    public function update(UpdateDataMahasiswaRequest $request, DataMahasiswa $dataMahasiswa)
    {
        $dataMahasiswa->update($request->validated());

        $dataMahasiswa->updateMedia($request->input('data_mahasiswa', []), 'data_mahasiswa_data_mahasiswa');

        return (new DataMahasiswaResource($dataMahasiswa))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(DataMahasiswa $dataMahasiswa)
    {
        abort_if(Gate::denies('data_mahasiswa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new DataMahasiswaResource($dataMahasiswa->load(['mataKuliah'])),
            'meta' => [
                'mata_kuliah' => MataKuliah::get(['id', 'id_mtk']),
            ],
        ]);
    }

    public function destroy(DataMahasiswa $dataMahasiswa)
    {
        abort_if(Gate::denies('data_mahasiswa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataMahasiswa->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['data_mahasiswa_create', 'data_mahasiswa_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new DataMahasiswa();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
