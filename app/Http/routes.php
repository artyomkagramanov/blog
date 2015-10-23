<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Home routes
Route::get('/','HomeController@index');

//Login Routes

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset routes...

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');


Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Categories root

//Route::get('/categories', 'Category\CategoryController@index');
//Route::get('/category/{id}', 'Category\CategoryController@show');
//Route::get('/category/{id}/edit', 'Category\CategoryController@edit');
//Route::get('/category/{id}/destroy', 'Category\CategoryController@destroy');

//Posts root




Route::resource('category', 'Category\CategoryController');

Route::resource('post', 'Post\PostController');
