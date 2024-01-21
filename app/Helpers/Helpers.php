<?php
    // Ubah menjadi format tanggal indo
    function indFormat($tanggal){
        return \Carbon\Carbon::parse($tanggal)->format('d-m-Y');
    }

    // Action Update Data
    function actionupdate($table,$id,$data){
        DB::table($table)->where('id', $id)->update($data);
    }
    // End Action

    function idn_user($id){
        $arr    = DB::table('users')->select('users.*', 'mst_role.name as level')->leftJoin('mst_role', 'mst_role.id', '=', 'users.role_id')->where('users.id', $id)->first();
        return $arr;
    }

    //Action Cek Data
    function cekdata($data){
        $table      = $data['table'];
        $whr        = $data['whr'];
        $id         = $data['id'];

        $arr['row'] = collect(\DB::select("SELECT * FROM $table WHERE $whr='$id'"))->first();

        return $arr;
    }
    //End Action Cek Data
    
?>
