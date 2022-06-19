<?php

namespace App\Http\Requests;

use App\Models\DataMahasiswaOnGoing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataMahasiswaOnGoingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_mahasiswa_on_going_create');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'nullable',
            ],
            'data_history_id' => [
                'integer',
                'exists:data_mahasiswas,id',
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
            'hasil_prediksi' => [
                'string',
                'nullable',
            ],
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
            'active' => [
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
            'accuracy' => [
                'numeric',
                'nullable',
            ],
            'recall_lulus' => [
                'numeric',
                'nullable',
            ],
            'recall_tidak_lulus' => [
                'numeric',
                'nullable',
            ],
            'precision_tidak_lulus' => [
                'numeric',
                'nullable',
            ],
            'precision_lulus' => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
