<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Route
Route::get('/', 'QuestionsController@index');

// Route Prefix
Route::prefix('/questions')->group(function() {
    // Get '/questions/', show questions page
    Route::get('/', 'QuestionsController@show');

    // Get POST method from creating a question
    Route::post('/', 'QuestionsController@create');

    // Get '/questions/create', show create question page
    Route::get('/create', function () {
        // If hasn't logged in, redirect to '/login'. Else, proceed
        if (Auth::check())return view('create', ['page_name' => 'ask_q', 'user_name' => Auth::user()->name]);
        else return redirect('/login');
    });

    Route::get('/{id}', 'QuestionsController@serve');
    Route::post('/{id}', 'AnswersController@answer');

    Route::get('/{id}/upvote', 'QuestionsController@upvote');
    Route::get('/{id}/downvote', 'QuestionsController@downvote');
});


// Get Logout
Route::get('/logout', 'Auth\LoginController@logout');

// Include Rutes for Authentication
Auth::routes();

// Home Route
Route::get('/home', 'HomeController@index')->name('home');
