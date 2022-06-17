<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChartsService;

class DashboardApiController extends Controller
{
    public function index()
    {
        $line0 = new ChartsService([
            'title'            => 'Contoh Report',
            'chart_type'       => 'line',
            'model'            => 'App\Models\Mahasiswa',
            'group_by_field'   => 'created_at',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-6',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        $bar1 = new ChartsService([
            'title'            => 'Contoh Report	2',
            'chart_type'       => 'bar',
            'model'            => 'App\Models\Dosen',
            'group_by_field'   => 'created_at',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-6',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        $pie2 = new ChartsService([
            'title'            => 'Count All',
            'chart_type'       => 'pie',
            'model'            => 'App\Models\DataDummy',
            'group_by_field'   => 'created_at',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-6',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        $pie3 = new ChartsService([
            'title'            => 'Sum Lulus',
            'chart_type'       => 'pie',
            'model'            => 'App\Models\DataDummy',
            'group_by_field'   => 'created_at',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-6',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        $pie4 = new ChartsService([
            'title'            => 'AVG Lulus',
            'chart_type'       => 'pie',
            'model'            => 'App\Models\DataDummy',
            'group_by_field'   => 'created_at',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-6',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        return response()->json(compact('line0', 'bar1', 'pie2', 'pie3', 'pie4'));
    }
}
