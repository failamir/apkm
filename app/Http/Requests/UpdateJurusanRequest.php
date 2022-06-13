<?php

namespace App\Http\Requests;

use App\Models\Jurusan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJurusanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jurusan_edit');
    }

    public function rules()
    {
        return [
            'id_jurusan' => [
                'string',
                'required',
                'unique:jurusans,id_jurusan,' . request()->route('jurusan')->id,
            ],
            'nama_jurusan' => [
                'string',
                'nullable',
            ],
        ];
    }
}
