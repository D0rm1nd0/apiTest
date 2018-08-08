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

Route::get('/', 'ShowDataController@index')->name('home');
Route::get('home', 'ShowDataController@index');
Route::get('/get-user', function () {
    return ['user' => Auth::user() ? Auth::user() : null];
});
Auth::routes();
