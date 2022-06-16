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
            'nama_data' => [
                'string',
                'nullable',
            ],
            'data_excel' => [
                'array',
                'nullable',
            ],
            'data_excel.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
