<?php

namespace App\Http\Controllers;

use App\Models\QuestionsModel;
use App\Models\UsersModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index() {
        $table_contents = QuestionsModel::get_questions();
        
        $user_name = Auth::check() ? Auth::user()->name : '';

        $questions = [];

        if (count($table_contents)) {
            for ($i = count($table_contents) - 1;$i >= count($table_contents) - 3;$i--) {
                array_push($questions, $table_contents[$i]);
            }
        }

        $page_name = 'home';
        return view('index', compact('page_name','questions', 'user_name'));
    }

    public function show() {
        $table_contents = QuestionsModel::get_questions();
        
        $user_name = Auth::check() ? Auth::user()->name : '';

        $page_name = 'questions';
        return view('questions', compact('page_name', 'table_contents','user_name'));
    }

    public function create(Request $request) {
        if (!$request->title)return redirect('/questions/create');
        if (!$request->content)return redirect('/questions/create');
        if (!$request->tags)$request->tags = "none";

        $date = Carbon::now()->toDateTimeString();

        $added = QuestionsModel::add_question([
            'title' => $request->title,
            'content' => $request->content,
            'tags' => $request->tags,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        return redirect("/questions");
    }
}
