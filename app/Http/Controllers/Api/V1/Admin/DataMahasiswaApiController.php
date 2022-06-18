<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataMahasiswaRequest;
use App\Http\Requests\UpdateDataMahasiswaRequest;
use App\Http\Resources\Admin\DataMahasiswaResource;
use App\Models\DataMahasiswa;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DataMahasiswaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_mahasiswa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataMahasiswaResource(DataMahasiswa::advancedFilter());
    }

    public function store(StoreDataMahasiswaRequest $request)
    {
        // $request->input('cantik') = 'andri';
        $dataMahasiswa = DataMahasiswa::create(array_merge($request->validated(),
        ['Lulus' => 123],
         ['TidakLulus' => 123],
         ['Active' => 123],
         ['Observers' => 123],
         ['Accuracy' => 123],
         ['RecallLulus' => 123],
         ['RecallTidakLulus' => 123],
         ['PrecisionTidakLulus' => 123],
         ['PrecisionLulus' => 123],
         
        ));
        if ($media = $request->input('data_mahasiswa', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $dataMahasiswa->id]);
        }

        // $dataMahasiswa->andri = 'cantik';
        $a = $request->input('batas_nilai');
        // $b = '../../../../public/storage/'.$request->input('data_mahasiswa')[0]["id"].'/'.$request->input('data_mahasiswa')[0]["file_name"];
        $b = $request->input('data_mahasiswa')[0]["file_name"];
        // var_dump($a);
        // var_dump($b);
        $date = date('dmYhsi');
        // var_dump($date);
        // $process = new Process(["python3", "Proses.py '$a' '$b' '$date'"]);
        // $process = new Process(["python3", "ProsesH.py '$a' '$b' '$date'"]);
        // $process->run();

        // executes after the command finishes
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }

        // echo $process->getOutput();
        $py = env('PYPATH',);
        $andri=exec("'$py' Proses.py '$a' '$b' '$date'  2>&1", $out, $ret);
        // $andri = exec("python3 ../../../../Proses.py '$a' '$date'", $out, $ret);
        // var_dump($andri);
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
         $dataMahasiswa->update(array_merge($request->validated(),
         ['Lulus' => $andri->LulusdanTidakLulus[0]],
         ['TidakLulus' => $andri->LulusdanTidakLulus[1]],
         ['Active' => $andri->MahasiswaActivedanObservers[0]],
         ['Observers' => $andri->MahasiswaActivedanObservers[1]],
         ['Accuracy' => $andri->Accuracy],
         ['RecallLulus' => $andri->RecallLulus],
         ['RecallTidakLulus' => $andri->RecallTidakLulus],
         ['PrecisionTidakLulus' => $andri->PrecisionTidakLulus],
         ['PrecisionLulus' => $andri->PrecisionLulus],
         
        ));
        return (new DataMahasiswaResource($dataMahasiswa))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
            
    }

    public function create()
    {
        abort_if(Gate::denies('data_mahasiswa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(DataMahasiswa $dataMahasiswa)
    {
        abort_if(Gate::denies('data_mahasiswa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataMahasiswaResource($dataMahasiswa);
    }

    public function proses(DataMahasiswa $dataMahasiswa)
    {
        abort_if(Gate::denies('data_mahasiswa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $d = new stdClass();
        // $d->andri = 'cantik';
        // array_push($dataDummy,$d);
        $dataMahasiswa->andri = 'cantik';
        return new DataMahasiswaResource($dataMahasiswa);
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
            'data' => new DataMahasiswaResource($dataMahasiswa),
            'meta' => [],
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
