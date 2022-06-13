<?php

namespace App\Http\Requests;

use App\Models\Jurusan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJurusanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jurusan_create');
    }

    public function rules()
    {
        return [
            'id_jurusan' => [
                'string',
                'required',
                'unique:jurusans',
            ],
            'nama_jurusan' => [
                'string',
                'nullable',
            ],
        ];
    }
}
