<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function signup(Request $request) {
        $user_name = UsersModel::add_user(
            [
                "user_name" => $request->name,
                "user_password" => $request->passwd,
                "rep_points" => 0
            ]
        )->user_name;
        return view('index');
    }
}
