<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'QuestionsController@index');

Route::prefix('/questions')->group(function() {
    Route::get('/', 'QuestionsController@show');

    Route::get('/create', function () {
        return view('create', ['page_name' => 'ask_q']);
    });
});
