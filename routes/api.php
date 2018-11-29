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

Route::get('customers','CustomerApiController@index');
Route::get('customers/{id}',
'CustomerApiController@view');

Route::post('customers','CustomerApiController@create');
Route::put('customers/{id}','CustomerApiController@update');
Route::delete('customers/{id}','CustomerApiController@delete');

Route::get('login','CustomerApiController@login');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
