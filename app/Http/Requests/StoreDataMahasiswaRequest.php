<?php

namespace App\Http\Requests;

use App\Models\DataMahasiswa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataMahasiswaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_mahasiswa_create');
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
            'mata_kuliah_id' => [
                'integer',
                'exists:mata_kuliahs,id',
                'nullable',
            ],
            'batas_nilai' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'lulus' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'tidaklulus' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'active' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'observers' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'accuracy' => [
                'numeric',
                'nullable',
            ],
            'recall_lulus' => [
                'numeric',
                'nullable',
            ],
            'recall_tidak_lulus' => [
                'numeric',
                'nullable',
            ],
            'precision_tidak_lulus' => [
                'numeric',
                'nullable',
            ],
            'precision_lulus' => [
                'numeric',
                'nullable',
            ],
            'location' => [
                'string',
                'nullable',
            ],
        ];
    }
}
