<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListKampuRequest;
use App\Http\Requests\UpdateListKampuRequest;
use App\Http\Resources\Admin\ListKampuResource;
use App\Models\ListKampu;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListKampusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('list_kampu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListKampuResource(ListKampu::advancedFilter());
    }

    public function store(StoreListKampuRequest $request)
    {
        $listKampu = ListKampu::create($request->validated());

        return (new ListKampuResource($listKampu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('list_kampu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(ListKampu $listKampu)
    {
        abort_if(Gate::denies('list_kampu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListKampuResource($listKampu);
    }

    public function update(UpdateListKampuRequest $request, ListKampu $listKampu)
    {
        $listKampu->update($request->validated());

        return (new ListKampuResource($listKampu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(ListKampu $listKampu)
    {
        abort_if(Gate::denies('list_kampu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ListKampuResource($listKampu),
            'meta' => [],
        ]);
    }

    public function destroy(ListKampu $listKampu)
    {
        abort_if(Gate::denies('list_kampu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listKampu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
