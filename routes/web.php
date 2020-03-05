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

// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('/home', 'StepsController@home')->name('steps.home');


Route::get('/mypage', 'StepsController@mypage')->name('steps.mypage');


Route::get('/stepregist', 'StepsController@new')->name('steps.new');

Route::post('/stepregist', 'StepsController@create')->name('steps.create');


Route::get('/stepdetail/{id}', 'StepsController@show')->name('steps.show');


Route::get('/stepedit/{id}', 'StepsController@edit')->name('steps.edit');

Route::post('/stepedit/{id}', 'StepsController@update')->name('steps.update');



Route::get('/profedit', function () {
    return view('profedit');
});

Route::get('/profdetail', function () {
    return view('profdetail');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
