<?php

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


Route::get('/', 'StepsController@top')->name('steps.top');

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/step', 'StepsController@index')->name('steps.index');

Route::get('/step/json', 'StepsController@index_json')->name('steps.index_json');


Route::get('/mypage', 'StepsController@mypage')->name('steps.mypage');

Route::get('/mystep/json','StepsController@mystep_json')->name('steps.mystep_json');

Route::get('/mychallenge/json','StepsController@mychallenge_json')->name('steps.mychallenge_json');


Route::get('/step/new', 'StepsController@new')->name('steps.new');

Route::post('/step', 'StepsController@create')->name('steps.create');


Route::get('/step/{id}', 'StepsController@show')->name('steps.show');

Route::get('/step/json/{id}', 'StepsController@show_json')->name('step.show_json');


Route::get('/step/{id}/edit', 'StepsController@edit')->name('steps.edit');

Route::post('/step/do_child/', 'DoChildStepController@create')->name('do_child_steps.create');



Route::get('prof/{id}','UserController@show')->name('users.show');

Route::get('/prof/{id}/edit', 'UserController@edit')->name('users.edit');

Route::post('/prof/{id}', 'UserController@update')->name('users.update');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
