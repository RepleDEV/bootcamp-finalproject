<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class QuestionsModel {
    public static function get_questions() {
        return DB::table('questions')->get();
    }
    public static function add_question($data) {
        DB::table('questions')->insert($data);
        return DB::table('questions')->where('content',$data['content'])->get()[0];
    }
}
