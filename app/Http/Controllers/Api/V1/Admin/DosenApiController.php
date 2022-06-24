<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;
use App\Http\Resources\Admin\DosenResource;
use App\Models\Dosen;
use App\Models\Jurusan;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DosenApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dosen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DosenResource(Dosen::with(['jurusan'])->advancedFilter());
    }

    public function store(StoreDosenRequest $request)
    {
        $dosen = Dosen::create($request->validated());
        $dosen->jurusan()->sync($request->input('jurusan.*.id', []));

        return (new DosenResource($dosen))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('dosen_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'jurusan' => Jurusan::get(['id', 'nama_jurusan']),
                'title'   => Dosen::TITLE_RADIO,
            ],
        ]);
    }

    public function show(Dosen $dosen)
    {
        abort_if(Gate::denies('dosen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DosenResource($dosen->load(['jurusan']));
    }

    public function update(UpdateDosenRequest $request, Dosen $dosen)
    {
        $dosen->update($request->validated());
        $dosen->jurusan()->sync($request->input('jurusan.*.id', []));

        return (new DosenResource($dosen))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Dosen $dosen)
    {
        abort_if(Gate::denies('dosen_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new DosenResource($dosen->load(['jurusan'])),
            'meta' => [
                'jurusan' => Jurusan::get(['id', 'nama_jurusan']),
                'title'   => Dosen::TITLE_RADIO,
            ],
        ]);
    }

    public function destroy(Dosen $dosen)
    {
        abort_if(Gate::denies('dosen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dosen->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
