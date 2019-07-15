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
Route::get('items','ItemsController@index');
Route::get('items/{id}','ItemsController@show');
Route::post('items','ItemsController@store');
Route::put('items/{id}','ItemsController@update');
Route::delete('items/{id}','ItemsController@destroy');
Route::any('error','ItemsController@errors');