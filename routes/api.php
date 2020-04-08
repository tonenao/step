<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['cors'])->group( function() {
    Route::get('/step/json', 'StepsController@index_json')->name('steps.index_json');

    Route::get('/favorite/json', 'StepsController@favorite_json')->name('steps.favorite_json');

    Route::get('/mystep/json','StepsController@mystep_json')->name('steps.mystep_json');

    Route::get('/mychallenge/json','StepsController@mychallenge_json')->name('steps.mychallenge_json');

    Route::get('/step/json/{id}', 'StepsController@show_json')->name('step.show_json');
    
 });