<?php

namespace App\Http\Requests;

use App\Models\Dosen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateDosenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dosen_edit');
    }

    public function rules()
    {
        return [
            'id_dosen' => [
                'string',
                'nullable',
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
                'string',
                'nullable',
            ],
        ];
    }
}
