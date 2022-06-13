<?php

namespace App\Http\Requests;

use App\Models\Dosen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class StoreDosenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dosen_create');
    }

    public function rules()
    {
        return [
            'id_dosen' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
                'unique:dosens',
            ],
            'nama_dosen' => [
                'string',
                'required',
            ],
            'jurusan' => [
                'array',
            ],
            'jurusan.*.id' => [
                'integer',
                'exists:jurusans,id',
            ],
            'title' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Dosen::TITLE_RADIO, 'value')),
            ],
            'email' => [
                'nullable',
            ],
            'no_hp' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
