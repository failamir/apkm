<?php

namespace App\Http\Requests;

use App\Models\DataPreparation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataPreparationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_preparation_edit');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'nullable',
            ],
            'akses_file' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'akses_video' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'akses_forum' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'kuis_1' => [
                'numeric',
                'nullable',
            ],
            'kuis_2' => [
                'numeric',
                'nullable',
            ],
            'tugas_1' => [
                'numeric',
                'nullable',
            ],
            'tugas_2' => [
                'string',
                'nullable',
            ],
            'nilai_akhir' => [
                'numeric',
                'nullable',
            ],
            'status_1' => [
                'string',
                'nullable',
            ],
            'status_2' => [
                'string',
                'nullable',
            ],
            'status_3' => [
                'string',
                'nullable',
            ],
        ];
    }
}
