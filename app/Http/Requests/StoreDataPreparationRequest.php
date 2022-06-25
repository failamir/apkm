<?php

namespace App\Http\Requests;

use App\Models\DataPreparation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataPreparationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_preparation_create');
    }

    public function rules()
    {
        return [
            'data_log' => [
                'array',
                'nullable',
            ],
            'data_log.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'data_nilai' => [
                'array',
                'nullable',
            ],
            'data_nilai.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'temp_log' => [
                'string',
                'nullable',
            ],
            'temp_nilai' => [
                'string',
                'nullable',
            ],
        ];
    }
}
