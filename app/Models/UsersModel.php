<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class UsersModel {
    public static function get_users() {
        return DB::table('users')->get();
    }
}
