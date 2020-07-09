<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class UsersModel {
    public static function get_users() {
        return DB::table('users')->get();
    }
    public static function add_user($data) {
        DB::table('users')->insert($data);
        // return DB::table('users')->where('user_name',$data->name)->get()[0];
    }

}
