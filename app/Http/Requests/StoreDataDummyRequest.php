<?php

namespace App\Http\Requests;

use App\Models\DataDummy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataDummyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_dummy_create');
    }

    public function rules()
    {
        return [
            'lulus' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'tidak_lulus' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'observers' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
