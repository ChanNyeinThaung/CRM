<?php

/* === Customer Routes === */
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/view/{id}', 'CustomerController@view');
Route::get('/customers/add', 'CustomerController@add');
Route::post('/customers/add', 'CustomerController@create');
Route::get('/customers/edit/{id}', 'CustomerController@edit');
Route::post('/customers/edit/{id}', 'CustomerController@update');
Route::get('/customers/delete/{id}', 'CustomerController@delete');

/* === Complain Routes === */
Route::get('/complains', 'ComplainController@index');
Route::get('/complains/view/{id}', 'ComplainController@view');
Route::get('/complains/add', 'ComplainController@add');
Route::post('/complains/add', 'ComplainController@create');
Route::post('/complains/edit/{id}', 'ComplainController@update');
Route::get('/complains/delete/{id}', 'ComplainController@delete');
Route::get('/complains/filter/{status}', 'ComplainController@filter');
Route::get('/complains/status/{id}/{status}', 'ComplainController@status');
Route::get('/complains/assign/{id}/{user}', 'ComplainController@assign');

Route::post('/comments/add', 'ComplainController@addComment');

Route::get('/', 'ComplainController@index');

Auth::routes();

Route::get('/home', 'ComplainController@index')->name('home');
