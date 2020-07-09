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

Route::get('/', 'QuestionsController@index');

Route::prefix('/questions')->group(function() {
    Route::get('/', 'QuestionsController@show');

    Route::get('/create', function () {
        if (Auth::check())return view('create', ['page_name' => 'ask_q', 'user_name' => Auth::user()->name]);
        else return redirect('/login');
    });
});

// Route::get('/login', function () {
//     return view('login', ['page_name'=> ""]);
// });
// Route::post('/login', 'UsersController@login')->name('login');

// Route::get('/signup', function () {
//     return view('signup', ['page_name'=> ""]);
// });
// Route::post('/signup', 'UsersController@signup')->name('signup');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/test', function () {
    return Auth::user();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
