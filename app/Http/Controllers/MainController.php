<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use App\Models\user;
use Auth;
use Hash;
use Redirect;
use DB;

class MainController extends Controller
{

    function dasbor() : object {
        $idn_user   = idn_user(auth::user()->id);

        $data = array(
            'title'     => 'Dashboard',
            'idn_user'  => $idn_user
        );
     
        return view('Dashboard.list')->with($data);

    }

    // Manage Data
    function managerole() : object {
        $idn_user   = idn_user(auth::user()->id);

        $arr    = DB::table('mst_role')->where('is_active', 1)->get();
        $data = array(
            'title'     => 'Manage Data',
            'arr'       => $arr,
            'idn_user'  => $idn_user
        );
     
        return view('Managedata.role')->with($data);

    }

    function manageusers() : object {
        $idn_user   = idn_user(auth::user()->id);
        $arr    = DB::table('users')->select('users.*', 'mst_role.name as level')->leftJoin('mst_role', 'mst_role.id', '=', 'users.role_id')->where('users.is_active', 1)->get();
        $role   = DB::table('mst_role')->where('is_active', 1)->get();
        $data = array(
            'title'     => 'Manage Data',
            'arr'   => $arr,
            'role'  => $role,
            'idn_user'  => $idn_user
        );
     
        return view('Managedata.users')->with($data);

    }

    function managemachine() : object {
        $idn_user   = idn_user(auth::user()->id);

        $data = array(
            'title'     => 'Manage Data',
            'idn_user'  => $idn_user
        );
     
        return view('Managedata.machine')->with($data);

    }

    // End Manage Data

    // Corrective
    function createcorrective() : object {
        $idn_user   = idn_user(auth::user()->id);

        $data = array(
            'title'     => 'Corrective',
            'idn_user'  => $idn_user
        );
     
        return view('Corrective.create')->with($data);

    }

    function actioncorrective() : object {
        $idn_user   = idn_user(auth::user()->id);

        $data = array(
            'title'     => 'Corrective',
            'idn_user'  => $idn_user
        );
     
        return view('Corrective.action')->with($data);

    }

    
    // End Corrective



    // Upload Image
    function upload_profile(Request $request) : object {

        if($request->hasFile('add_foto')){
            $fourRandomDigit = rand(10,99999);
            $photo      = $request->file('add_foto');
            $fileName   = $fourRandomDigit.'.'.$photo->getClientOriginalExtension();

            $path = public_path().'/assets/profiles/';

            File::makeDirectory($path, 0777, true, true);

            $request->file('add_foto')->move($path, $fileName);

            return response($fileName);
        }elseif($request->hasFile('add_image')){
            $fourRandomDigit = rand(10,99999);
            $photo      = $request->file('add_image');
            $fileName   = $fourRandomDigit.'.'.$photo->getClientOriginalExtension();

            $path = public_path().'/assets/products/';

            File::makeDirectory($path, 0777, true, true);

            $request->file('add_image')->move($path, $fileName);

            return response($fileName);
        }elseif($request->hasFile('add_file')){
            $fourRandomDigit = rand(10,99999);
            $photo      = $request->file('add_file');
            $fileName   = $fourRandomDigit.'.'.$photo->getClientOriginalExtension();

            $path = public_path().'/assets/file/';

            File::makeDirectory($path, 0777, true, true);

            $request->file('add_file')->move($path, $fileName);

            return response($fileName);
        }else{
            return response('Failed');
        }

    }

    // Action Add
    function actionadd(Request $request) : object {
        $table      = $request['table'];
        $dt         = $request['data'];
        if($table == 'users'){
            $data   = array(
                'username'  => $dt['username'],
                'password'  => Hash::make($dt['password']),
                'pass'      => $dt['password'],
                'role_id'   => $dt['role_id'],
                'name'      => $dt['name'],
                'email'     => $dt['email'],
                'no_tlp'    => $dt['no_tlp'],
                'foto'      => $dt['foto'],
                'status'    => 0,
                'is_active' => 1,
                'update_by' => auth::user()->id,
            );
        }else{
            $data   = $request['data'];
        }
        // $data       = $request['data'];
        DB::table($table)->insert([$data]);
        return response('success');
    }

    // Action Edit
    function actionedit(Request $request) : object {
        $table      = $request['table'];
        $id         = $request['id'];
        $whr        = $request['whr'];
        $dt         = $request['dats'];
        if($table == 'users'){
            $data   = array(
                'username'  => $dt['username'],
                'password'  => Hash::make($dt['password']),
                'pass'      => $dt['password'],
                'role_id'   => $dt['role_id'],
                'name'      => $dt['name'],
                'email'     => $dt['email'],
                'no_tlp'    => $dt['no_tlp'],
                'foto'      => $dt['foto'],
                'status'    => 0,
                'update_by' => auth::user()->id,
            );
        }else{
            $data   = $request['dats'];
        }

        DB::table($table)->where($whr, $id)->update($data);
        return response('success');
    }

    function actioneditwmulti(Request $request) : object {
        $table      = $request['table'];
        $id1        = $request['id1'];
        $whr1       = $request['whr1'];
        $id2        = $request['id2'];
        $whr2       = $request['whr2'];
        $data       = $request['dats'];

        DB::table($table)->where($whr1, $id1)->where($whr2, $id2)->update($data);
        return response('success');
    }

    // Action Delete
    function actiondelete(Request $request) : object {
        $table      = $request['table'];
        $id         = $request['id'];
        $whr        = $request['whr'];
        $data   = array(
            'is_active' => 0,
            'update_by' => 1,
        );
        DB::table($table)->where($whr, $id)->update($data);
        return response('success');
    }

    // Action Show Data
    function actionshowdata(Request $request) : object {
        $id     = $request['id'];
        $field  = $request['field'];
        $table  = $request['table'];
        $arr['data']    = DB::table($table)->where($field, $id)->first();
        return response($arr);
    }

    function actionshowdatawmulti(Request $request) : object {
        $id1     = $request['id1'];
        $field1  = $request['field1'];
        $id2     = $request['id2'];
        $field2  = $request['field2'];
        $table   = $request['table'];
        $arr['data']    = DB::table($table)->where($field1, $id1)->where($field2, $id2)->first();
        return response($arr);
    }

    // Action List Data
    function actionlistdata(Request $request) : object {
        if($request['id'] == 0 || $request['id'] == null){
            $id     = 1;
        }else{
            $id     = $request['id'];
        }
        $field  = $request['field'];
        $table  = $request['table'];
        $arr    = DB::select("SELECT * FROM $table WHERE $field=$id AND is_active=1 ");
        return response($arr);
    }

}
