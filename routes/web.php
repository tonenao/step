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


Route::get('/login', function () {
    return view('auth.login');
});


Auth::routes();



//ContactController

Route::get('/contact', 'ContactsController@index')->name('contact');

Route::post('/contact/confirm', 'ContactsController@confirm')->name('confirm');

Route::post('/contact/complete', 'ContactsController@complete')->name('complete');



//StepsController

Route::get('/', 'StepsController@top')->name('steps.top');

Route::get('/step', 'StepsController@index')->name('steps.index');

Route::get('/step/json', 'StepsController@index_json')->name('steps.index_json');

Route::get('/favorite/json', 'StepsController@favorite_json')->name('steps.favorite_json');


Route::get('/mypage', 'StepsController@mypage')->name('steps.mypage');

Route::get('/mystep/json','StepsController@mystep_json')->name('steps.mystep_json');

Route::get('/mychallenge/json','StepsController@mychallenge_json')->name('steps.mychallenge_json');


Route::get('/step/new', 'StepsController@new')->name('steps.new');

Route::post('/step', 'StepsController@create')->name('steps.create');


Route::get('/step/json/{id}', 'StepsController@show_json')->name('step.show_json');

Route::get('/step/{id}', 'StepsController@show')->name('steps.show');


Route::get('/step/{id}/edit', 'StepsController@edit')->name('steps.edit');

Route::post('/step/{id}/edit/', 'StepsController@update')->name('steps.update');






//DoStepController

Route::post('/do_step', 'DoStepController@update');

Route::post('/do_step/challenge', 'DoStepController@challenge');

Route::post('/do_step/giveup', 'DoStepController@giveup');



//ChildStepController

Route::post('/step/child_step','ChildStepController@create');

Route::delete('/step/child_step','ChildStepController@delete');

Route::post('/step/{id}/child_step','ChildStepController@update');



//DoChildStepController

Route::post('/step/do_child', 'DoChildStepController@create');

Route::delete('/step/do_child', 'DoChildStepController@delete');


//UserController

Route::get('/prof/edit', 'UserController@edit')->name('users.edit');

Route::get('/prof/{id}','UserController@show')->name('users.show');

Route::post('/prof', 'UserController@update')->name('users.update');




