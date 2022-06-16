<?php

namespace App\Http\Requests;

use App\Models\DataUpload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataUploadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_upload_create');
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
