<?php

namespace App\Http\Requests;

use App\Models\Kampu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKampuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kampu_create');
    }

    public function rules()
    {
        return [
            'id_kampus' => [
                'string',
                'nullable',
            ],
            'nama_kampus' => [
                'string',
                'nullable',
            ],
            'alamat' => [
                'string',
                'nullable',
            ],
            'deskripsi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
