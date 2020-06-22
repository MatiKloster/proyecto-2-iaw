<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

Route::get('/home', function () {
    return redirect()->route('home');
});
Route::get('/Album','AlbumController@index')->name('albumIndex');
Route::get('/Album/create','AlbumController@create')->name('albumCreation');
Route::get('/Album/search','AlbumController@search')->name('albumSearch');
Route::get('/Album/{id}','AlbumController@show')->name('albumShow');
Route::post('/Album/store','AlbumController@store')->name('albumStore');
Route::get('/Album/edit/{id}','AlbumController@edit')->name('albumEdit');
Route::put('/Album/edit/{id}','AlbumController@update')->name('albumUpdate');
Route::delete('/Album/delete/{id}','AlbumController@delete')->name('albumDelete');


Route::get('/Movie','MovieController@index')->name('movieIndex');
Route::get('/Movie/create','MovieController@create')->name('movieCreation');
Route::get('/Movie/search','MovieController@search')->name('movieSearch');
Route::get('/Movie/{id}','MovieController@show')->name('movieShow');
Route::post('/Movie/store','MovieController@store')->name('movieStore');
Route::get('/Movie/edit/{id}','MovieController@edit')->name('movieEdit');
Route::put('/Movie/edit/{id}','MovieController@update')->name('movieUpdate');
Route::delete('/Movie/delete/{id}','MovieController@delete')->name('movieDelete');

Auth::routes();

Route::get('/Book/Album/{albumId}/{userId}','BookController@bookAlbum')->name('bookAlbum');
Route::get('/Book/Movie/{movieId}/{userId}','BookController@bookMovie')->name('bookMovie');
Route::get('/', 'HomeController@index')->name('home');
