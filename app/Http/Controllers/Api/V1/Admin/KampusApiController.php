<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKampuRequest;
use App\Http\Requests\UpdateKampuRequest;
use App\Http\Resources\Admin\KampuResource;
use App\Models\Kampu;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KampusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kampu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KampuResource(Kampu::advancedFilter());
    }

    public function store(StoreKampuRequest $request)
    {
        $kampu = Kampu::create($request->validated());

        return (new KampuResource($kampu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('kampu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Kampu $kampu)
    {
        abort_if(Gate::denies('kampu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KampuResource($kampu);
    }

    public function update(UpdateKampuRequest $request, Kampu $kampu)
    {
        $kampu->update($request->validated());

        return (new KampuResource($kampu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Kampu $kampu)
    {
        abort_if(Gate::denies('kampu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new KampuResource($kampu),
            'meta' => [],
        ]);
    }

    public function destroy(Kampu $kampu)
    {
        abort_if(Gate::denies('kampu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kampu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
