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
    public static function get_by_id($id) {
        return DB::table('questions')->where('id', $id)->first();
    }
    public static function edit($data,$field,$row_id) {
        $affected = DB::table('questions')
                        ->where('id',$row_id)
                        ->update([$field => $data]);
        return $affected;
    }
}
