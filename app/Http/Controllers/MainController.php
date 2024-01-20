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

    function dasbor() : object {

        $data = array(
            'title'     => 'Dashboard',
        );
     
        return view('Dashboard.list')->with($data);

    }

    // Corrective
    function createcorrective() : object {

        $data = array(
            'title'     => 'Corrective',
        );
     
        return view('Corrective.create')->with($data);

    }
    // End Corrective


}
