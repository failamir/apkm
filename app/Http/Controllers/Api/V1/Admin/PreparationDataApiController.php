<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePreparationDataRequest;
use App\Http\Requests\UpdatePreparationDataRequest;
use App\Http\Resources\Admin\PreparationDataResource;
use App\Models\PreparationData;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PreparationDataApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('preparation_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PreparationDataResource(PreparationData::advancedFilter());
    }

    public function store(StorePreparationDataRequest $request)
    {
        $preparationData = PreparationData::create($request->validated());

        if ($media = $request->input('data_log', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $preparationData->id]);
        }

        if ($media = $request->input('data_nilai', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $preparationData->id]);
        }

        return (new PreparationDataResource($preparationData))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('preparation_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(PreparationData $preparationData)
    {
        abort_if(Gate::denies('preparation_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PreparationDataResource($preparationData);
    }

    public function update(UpdatePreparationDataRequest $request, PreparationData $preparationData)
    {
        $preparationData->update($request->validated());

        $preparationData->updateMedia($request->input('data_log', []), 'preparation_data_data_log');
        $preparationData->updateMedia($request->input('data_nilai', []), 'preparation_data_data_nilai');

        return (new PreparationDataResource($preparationData))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(PreparationData $preparationData)
    {
        abort_if(Gate::denies('preparation_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new PreparationDataResource($preparationData),
            'meta' => [],
        ]);
    }

    public function destroy(PreparationData $preparationData)
    {
        abort_if(Gate::denies('preparation_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $preparationData->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['preparation_data_create', 'preparation_data_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new PreparationData();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
