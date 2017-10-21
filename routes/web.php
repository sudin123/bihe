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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'Backend','prefix'=>'backend', 'middleware'=>'auth'], function () {
    $this->get('/', 'DashboardController@index')->name('backend');
    $this->resource('users','UserController');
});




Auth::routes();
