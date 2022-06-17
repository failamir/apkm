<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Http\Resources\Admin\MahasiswaResource;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MahasiswaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mahasiswa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MahasiswaResource(Mahasiswa::with(['jurusan'])->advancedFilter());
    }

    public function store(StoreMahasiswaRequest $request)
    {
        $mahasiswa = Mahasiswa::create($request->validated());

        return (new MahasiswaResource($mahasiswa))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('mahasiswa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'jurusan' => Jurusan::get(['id', 'nama_jurusan']),
            ],
        ]);
    }

    public function show(Mahasiswa $mahasiswa)
    {
        abort_if(Gate::denies('mahasiswa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MahasiswaResource($mahasiswa->load(['jurusan']));
    }

    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update($request->validated());

        return (new MahasiswaResource($mahasiswa))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        abort_if(Gate::denies('mahasiswa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new MahasiswaResource($mahasiswa->load(['jurusan'])),
            'meta' => [
                'jurusan' => Jurusan::get(['id', 'nama_jurusan']),
            ],
        ]);
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        abort_if(Gate::denies('mahasiswa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mahasiswa->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
