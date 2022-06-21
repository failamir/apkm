<?php

namespace App\Http\Requests;

use App\Models\ListKampu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreListKampuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('list_kampu_create');
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
            'deskripsi' => [
                'string',
                'nullable',
            ],
            'alamat' => [
                'string',
                'nullable',
            ],
        ];
    }
}
