<?php 

namespace App\Models;

use Illuminate\Support\Facades\DB;

class AnswersModel {
    public static function get_all() {
        $table_contents = DB::table('answers')->get();
        return $table_contents;
    }

    public static function find_by_id($id){
        $table_contents = DB::table('answers')->where('question_id',$id)->first();
        return $table_contents;
    }

    public static function save($data) {
        $new_item = DB::table('answers')->insert($data);
        return $new_item;
    }
}
