<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class QuestionsModel {
    public static function get_questions() {
        return DB::table('questions')->get();
    }
}
