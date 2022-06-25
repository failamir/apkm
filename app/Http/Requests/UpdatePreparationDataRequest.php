<?php

namespace App\Http\Requests;

use App\Models\PreparationData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePreparationDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('preparation_data_edit');
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
            'data_hasil' => [
                'array',
                'nullable',
            ],
            'data_hasil.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
