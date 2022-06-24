<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChartsService;
use Shuchkin\SimpleXLSX;


class DashboardApiController extends Controller
{
    public function index()
    {
        return response()->json();
    }

    public function excel()
    {
        $file = public_path() . '/storage/data_mentah.xlsx';
        if ( $xlsx = SimpleXLSX::parse($file) ) {
            $r = $xlsx->rows(1);
            // return print_r( $r );
        } else {
            echo SimpleXLSX::parseError();
        }
        foreach($r as $d){
            echo $d[5];
        }
        // return 999;
        // return response()->json();
    }
}
