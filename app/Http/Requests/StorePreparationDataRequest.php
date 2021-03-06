<?php

namespace App\Http\Requests;

use App\Models\PreparationData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePreparationDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('preparation_data_create');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'nullable',
            ],
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
                'string',
                'nullable',
            ],
            'mata_kuliah_id' => [
                'integer',
                'exists:mata_kuliahs,id',
                'nullable',
            ],
        ];
    }
}
