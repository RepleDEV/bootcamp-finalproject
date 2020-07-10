<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\QuestionsModel;
use App\Models\AnswersModel;
use Carbon\Carbon;

class AnswersController extends Controller
{
    public function answer(Request $req, $id) {
        $question_id = QuestionsModel::get_by_id($id)->id;

        $date = Carbon::now()->toDateTimeString();

        $user_name = Auth::check() ? Auth::user()->name : '';

        AnswersModel::save(
            [
                'content'=>$req->content,
                'created_at'=>$date,
                'updated_at'=>$date,
                'question_id'=>$question_id,
                'user_created'=> $user_name,
            ]
        );
        return redirect("/questions/$id");
    }
}
