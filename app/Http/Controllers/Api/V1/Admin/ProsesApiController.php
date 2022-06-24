<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChartsService;

class ProsesApiController extends Controller
{
    public function index()
    {
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

        // $pie3 = new ChartsService([
        //     'title'            => 'Sum Lulus',
        //     'chart_type'       => 'pie',
        //     'model'            => 'App\Models\DataDummy',
        //     'group_by_field'   => 'created_at',
        //     'group_by_period'  => 'day',
        //     'column_class'     => 'col-md-6',
        //     'filter_by_field'  => 'created_at',
        //     'filter_by_period' => 7,
        // ]);

        // $pie4 = new ChartsService([
        //     'title'            => 'AVG Lulus',
        //     'chart_type'       => 'pie',
        //     'model'            => 'App\Models\DataDummy',
        //     'group_by_field'   => 'created_at',
        //     'group_by_period'  => 'day',
        //     'column_class'     => 'col-md-6',
        //     'filter_by_field'  => 'created_at',
        //     'filter_by_period' => 7,
        // ]);

        return response()->json(compact('pie2'));
    }
}
