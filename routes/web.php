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

Auth::routes();
Route::get('/','DtpController@view');
Route::get('/home','DtpController@view');
Route::post('delete={id}','DtpController@delete');

Route::post('post-data','DtpController@post');