<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataMahasiswaOnGoingRequest;
use App\Http\Requests\UpdateDataMahasiswaOnGoingRequest;
use App\Http\Resources\Admin\DataMahasiswaOnGoingResource;
use App\Models\DataMahasiswa;
use App\Models\DataMahasiswaOnGoing;
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

        return new DataMahasiswaOnGoingResource(DataMahasiswaOnGoing::with(['dataHistory', 'mataKuliah'])->advancedFilter());
    }

    public function store(StoreDataMahasiswaOnGoingRequest $request)
    {
        $dataMahasiswaOnGoing = DataMahasiswaOnGoing::create($request->validated());

        if ($media = $request->input('data_mahasiswa', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $dataMahasiswaOnGoing->id]);
        }

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

    public function update(UpdateDataMahasiswaOnGoingRequest $request, DataMahasiswaOnGoing $dataMahasiswaOnGoing)
    {
        $dataMahasiswaOnGoing->update($request->validated());

        $dataMahasiswaOnGoing->updateMedia($request->input('data_mahasiswa', []), 'data_mahasiswa_on_going_data_mahasiswa');

        return (new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(DataMahasiswaOnGoing $dataMahasiswaOnGoing)
    {
        abort_if(Gate::denies('data_mahasiswa_on_going_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new DataMahasiswaOnGoingResource($dataMahasiswaOnGoing->load(['dataHistory', 'mataKuliah'])),
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
