<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChartsService;

class DashboardApiController extends Controller
{
    public function index()
    {
        $bar0 = new ChartsService([
            'title'            => 'Average Mahasiswa History Lulus',
            'chart_type'       => 'bar',
            'model'            => 'App\Models\DataMahasiswa',
            'group_by_field'   => 'created_at',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-6',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        $line1 = new ChartsService([
            'title'            => 'Average Mahasiswa Ongoing Lulus',
            'chart_type'       => 'line',
            'model'            => 'App\Models\DataMahasiswaOnGoing',
            'group_by_field'   => 'created_at',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-6',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        $pie2 = new ChartsService([
            'title'            => 'Average Mahasiswa History Tidak Lulus',
            'chart_type'       => 'pie',
            'model'            => 'App\Models\DataMahasiswa',
            'group_by_field'   => 'created_at',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-6',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        $bar3 = new ChartsService([
            'title'            => 'Average Mahasiswa Ongoing Tidak Lulus',
            'chart_type'       => 'bar',
            'model'            => 'App\Models\DataMahasiswaOnGoing',
            'group_by_field'   => 'created_at',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-6',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        return response()->json(compact('bar0', 'line1', 'pie2', 'bar3'));
    }
}
