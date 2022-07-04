<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMataKuliahRequest;
use App\Http\Requests\UpdateMataKuliahRequest;
use App\Http\Resources\Admin\MataKuliahResource;
use App\Models\Jurusan;
use App\Models\MataKuliah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MataKuliahApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mata_kuliah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MataKuliahResource(MataKuliah::with(['jurusan'])->advancedFilter());
    }

    public function store(StoreMataKuliahRequest $request)
    {
        $mataKuliah = MataKuliah::create($request->validated());

        if ($media = $request->input('data_mtk', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $mataKuliah->id]);
        }

        return (new MataKuliahResource($mataKuliah))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('mata_kuliah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'jurusan' => Jurusan::get(['id', 'nama_jurusan']),
            ],
        ]);
    }

    public function show(MataKuliah $mataKuliah)
    {
        abort_if(Gate::denies('mata_kuliah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MataKuliahResource($mataKuliah->load(['jurusan']));
    }

    public function update(UpdateMataKuliahRequest $request, MataKuliah $mataKuliah)
    {
        $mataKuliah->update($request->validated());

        $mataKuliah->updateMedia($request->input('data_mtk', []), 'mata_kuliah_data_mtk');

        return (new MataKuliahResource($mataKuliah))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(MataKuliah $mataKuliah)
    {
        abort_if(Gate::denies('mata_kuliah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new MataKuliahResource($mataKuliah->load(['jurusan'])),
            'meta' => [
                'jurusan' => Jurusan::get(['id', 'nama_jurusan']),
            ],
        ]);
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        abort_if(Gate::denies('mata_kuliah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mataKuliah->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['mata_kuliah_create', 'mata_kuliah_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new MataKuliah();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
