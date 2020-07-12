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

        if (count($table_contents) > 0) {
            for ($i = 0;$i < (count($table_contents) <= 5 ? count($table_contents) : 5);$i++) {
                array_push($questions, $table_contents[count($table_contents) - 1 - $i]);
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

        $user_name = Auth::check() ? Auth::user()->name : '';

        $added = QuestionsModel::add_question([
            'title' => $request->title,
            'content' => $request->content,
            'tags' => $request->tags,
            'created_at' => $date,
            'updated_at' => $date,
            'user_created' => $user_name
        ]);

        return redirect("/questions");
    }

    public function serve($id) {
        $question = QuestionsModel::get_by_id($id);

        $user_name = Auth::check() ? Auth::user()->name : '';

        return view('question_page', compact('question', 'user_name'));
    }

    public function upvote($id){
        if (!Auth::check())return redirect('/login');

        $question = QuestionsModel::get_by_id($id);

        $question_points = $question->points;
        $question_upvotes = explode(', ',$question->upvoted);
        $question_downvotes = explode(', ', $question->downvoted);

        $user_id = Auth::id();

        if (array_search(strval($user_id), $question_upvotes) !==  false) {
            return redirect("/questions/$id");
        } else {
            $search = array_search(strval($user_id), $question_downvotes);
            if ($search !== false) {
                array_splice($question_downvotes, $search, 1);
                $question_points++;
            }
            $res = join(', ', $question_upvotes) . strval($user_id);
            $res_d = join(', ', $question_downvotes);
            QuestionsModel::edit($res,'upvoted',$id);
            QuestionsModel::edit($res_d,'downvoted',$id);
        }

        QuestionsModel::edit($question_points + 1,'points',$id);

        return redirect("/questions/$id");
    }
    public function downvote($id) {
        if (!Auth::check())return redirect('/login');

        $question = QuestionsModel::get_by_id($id);

        $question_points = $question->points;
        $question_upvotes = explode(', ',$question->upvoted);
        $question_downvotes = explode(', ', $question->downvoted);

        $user_id = Auth::id();

        if (array_search(strval($user_id), $question_downvotes) !==  false) {
            return redirect("/questions/$id");
        } else {
            $search = array_search(strval($user_id), $question_upvotes);
            if ($search !== false) {
                array_splice($question_upvotes, $search, 1);
                $question_points--;
            }
            $res = join(', ', $question_downvotes) . strval($user_id);
            $res_u = join(', ', $question_upvotes);
            QuestionsModel::edit($res,'downvoted',$id);
            QuestionsModel::edit($res_u, 'upvoted', $id);
        }

        QuestionsModel::edit($question_points - 1,'points',$id);
        return redirect("/questions/$id");
    }
}
