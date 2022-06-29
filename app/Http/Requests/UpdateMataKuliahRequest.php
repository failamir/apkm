<?php

namespace App\Http\Requests;

use App\Models\MataKuliah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMataKuliahRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mata_kuliah_edit');
    }

    public function rules()
    {
        return [
            'id_mtk' => [
                'string',
                'nullable',
            ],
            'nama_mtk' => [
                'string',
                'required',
            ],
            'jurusan_id' => [
                'integer',
                'exists:jurusans,id',
                // 'nullable',
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
