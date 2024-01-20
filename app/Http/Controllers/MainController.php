<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;
use Auth;
use Redirect;
use DB;

class MainController extends Controller
{

    // function dasbor(): object
    // {

    //     $data = array(
    //         'title'     => 'Dashboard',
    //     );

    //     return view('Dashboard.list')->with($data);
    // }
    function dasbor(): object
    {

        $data = array(
            'title'     => 'Dashboard',
        );

        return view('Dashboard.list')->with($data);
    }

    function DashboardMaintenance(): object
    {

        $data = array(
            'title'     => 'Tabel View Maintenance',
        );

        return view('Dashboard.maintenance')->with($data);
    }

    function DashboardKlaimhandling(): object
    {

        $data = array(
            'title'     => 'Tabel View Klaim Handling',
        );

        return view('Dashboard.klaimhandling')->with($data);
    }
}
