<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataDummyRequest;
use App\Http\Requests\UpdateDataDummyRequest;
use App\Http\Resources\Admin\DataDummyResource;
use App\Models\DataDummy;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataDummyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_dummy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataDummyResource(DataDummy::advancedFilter());
    }

    public function store(StoreDataDummyRequest $request)
    {
        $dataDummy = DataDummy::create($request->validated());

        return (new DataDummyResource($dataDummy))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('data_dummy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(DataDummy $dataDummy)
    {
        abort_if(Gate::denies('data_dummy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataDummyResource($dataDummy);
    }

    public function update(UpdateDataDummyRequest $request, DataDummy $dataDummy)
    {
        $dataDummy->update($request->validated());

        return (new DataDummyResource($dataDummy))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(DataDummy $dataDummy)
    {
        abort_if(Gate::denies('data_dummy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new DataDummyResource($dataDummy),
            'meta' => [],
        ]);
    }

    public function destroy(DataDummy $dataDummy)
    {
        abort_if(Gate::denies('data_dummy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataDummy->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
