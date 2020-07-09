<?php

namespace App\Http\Controllers;

use App\Models\QuestionsModel;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index() {
        $table_contents = QuestionsModel::get_questions();
        
        $user_name = Auth::check() ? Auth::user()->name : '';

        // Gets latest questions
        $questions = [];
        for ($i = count($table_contents) - 1;$i >= 0;$i--) {
            array_push($questions, $table_contents[$i]);
        }

        $page_name = 'home';
        return view('index', compact('page_name','questions', 'user_name'));
    }

    public function show() {
        $table_contents = QuestionsModel::get_questions();
        
        $user_name = Auth::user()->name;

        $page_name = 'questions';
        return view('questions', compact('page_name', 'table_contents','user_name'));
    }
}
