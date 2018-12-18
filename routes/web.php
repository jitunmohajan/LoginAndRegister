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

Route::get('/','HomeController@login');
Route::get('register','HomeController@register');
Route::post('store','HomeController@store');
Route::post('postlogin','HomeController@postlogin');


Route::group(['middleware' => 'checkloggedin'], function(){
	Route::get('index','HomeController@index');
	Route::get('logout','HomeController@logout');
});
