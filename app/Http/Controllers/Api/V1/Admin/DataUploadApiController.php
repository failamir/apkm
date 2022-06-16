<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataUploadRequest;
use App\Http\Requests\UpdateDataUploadRequest;
use App\Http\Resources\Admin\DataUploadResource;
use App\Models\DataUpload;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DataUploadApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_upload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataUploadResource(DataUpload::advancedFilter());
    }

    public function store(StoreDataUploadRequest $request)
    {
        $dataUpload = DataUpload::create($request->validated());

        if ($media = $request->input('data_excel', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $dataUpload->id]);
        }

        return (new DataUploadResource($dataUpload))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('data_upload_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(DataUpload $dataUpload)
    {
        abort_if(Gate::denies('data_upload_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataUploadResource($dataUpload);
    }

    public function update(UpdateDataUploadRequest $request, DataUpload $dataUpload)
    {
        $dataUpload->update($request->validated());

        $dataUpload->updateMedia($request->input('data_excel', []), 'data_upload_data_excel');

        return (new DataUploadResource($dataUpload))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(DataUpload $dataUpload)
    {
        abort_if(Gate::denies('data_upload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new DataUploadResource($dataUpload),
            'meta' => [],
        ]);
    }

    public function destroy(DataUpload $dataUpload)
    {
        abort_if(Gate::denies('data_upload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataUpload->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['data_upload_create', 'data_upload_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new DataUpload();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
