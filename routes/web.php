<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/Album','AlbumController@index')->name('albumIndex');
Route::get('/Album/create','AlbumController@create')->name('albumCreation');
Route::post('/Album/store','AlbumController@store')->name('albumStore');
Route::get('/Movie','MovieController@index')->name('movieIndex');
Route::get('/Movie/create','MovieController@create')->name('movieCreation');
Route::post('/Movie/store','MovieController@store')->name('movieStore');
