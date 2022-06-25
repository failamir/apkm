<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataPreparationRequest;
use App\Http\Requests\UpdateDataPreparationRequest;
use App\Http\Resources\Admin\DataPreparationResource;
use App\Models\DataPreparation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DataPreparationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_preparation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataPreparationResource(DataPreparation::advancedFilter());
    }

    public function store(StoreDataPreparationRequest $request)
    {
        $dataPreparation = DataPreparation::create($request->validated());

        if ($media = $request->input('data_log', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $dataPreparation->id]);
        }

        if ($media = $request->input('data_nilai', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $dataPreparation->id]);
        }

        return (new DataPreparationResource($dataPreparation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('data_preparation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(DataPreparation $dataPreparation)
    {
        abort_if(Gate::denies('data_preparation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataPreparationResource($dataPreparation);
    }

    public function update(UpdateDataPreparationRequest $request, DataPreparation $dataPreparation)
    {
        $dataPreparation->update($request->validated());

        $dataPreparation->updateMedia($request->input('data_log', []), 'data_preparation_data_log');
        $dataPreparation->updateMedia($request->input('data_nilai', []), 'data_preparation_data_nilai');

        return (new DataPreparationResource($dataPreparation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(DataPreparation $dataPreparation)
    {
        abort_if(Gate::denies('data_preparation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new DataPreparationResource($dataPreparation),
            'meta' => [],
        ]);
    }

    public function destroy(DataPreparation $dataPreparation)
    {
        abort_if(Gate::denies('data_preparation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPreparation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['data_preparation_create', 'data_preparation_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new DataPreparation();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
