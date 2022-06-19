<?php

namespace App\Http\Requests;

use App\Models\DataMahasiswaOnGoing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataMahasiswaOnGoingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_mahasiswa_on_going_edit');
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
            'hasil_prediksi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
