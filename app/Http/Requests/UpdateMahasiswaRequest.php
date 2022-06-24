<?php

namespace App\Http\Requests;

use App\Models\Mahasiswa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMahasiswaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mahasiswa_edit');
    }

    public function rules()
    {
        return [
            'id_mahasiswa' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
                'unique:mahasiswas,id_mahasiswa,' . request()->route('mahasiswa')->id,
            ],
            'nama' => [
                'string',
                'required',
            ],
            'jurusan_id' => [
                'integer',
                'exists:jurusans,id',
                'nullable',
            ],
            'angkatan' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'email' => [
                'nullable',
            ],
            'no_hp' => [
                'string',
                'nullable',
            ],
        ];
    }
}
