<?php

use Illuminate\Routing\Router;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** @var Router $router */
$router->resource('questions', 'QuestionController')->except('show');
$router->get('/questions/{slug}', 'QuestionController@show')->name('questions.show');
//answer model
$router->resource('questions.answers', 'AnswerController')/*->except('index', 'create', 'show')*/;
//$router->post('/questions/{question}/answers', 'AnswerController@store')->name('answers.store');

