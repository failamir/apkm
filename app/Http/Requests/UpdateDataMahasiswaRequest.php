<?php

namespace App\Http\Requests;

use App\Models\DataMahasiswa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataMahasiswaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_mahasiswa_edit');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'nullable',
            ],
            'data_mahasiswa' => [
                'array',
                'nullable',
            ],
            'data_mahasiswa.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
