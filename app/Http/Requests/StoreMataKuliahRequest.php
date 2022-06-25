<?php

namespace App\Http\Requests;

use App\Models\MataKuliah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMataKuliahRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mata_kuliah_create');
    }

    public function rules()
    {
        return [
            'data_mtk' => [
                'array',
                'nullable',
            ],
            'data_mtk.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'id_mtk' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
                'unique:mata_kuliahs',
            ],
            'nama_mtk' => [
                'string',
                'required',
            ],
            'jurusan_id' => [
                'integer',
                'exists:jurusans,id',
                'nullable',
            ],
            'jumlah_sks' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
