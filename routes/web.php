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
Route::get('/Album','AlbumController@index')->name('albumIndex')->withoutMiddleware('admin');
Route::get('/Album/create','AlbumController@create')->name('albumCreation');
Route::get('/Album/search','AlbumController@search')->name('albumSearch')->withoutMiddleware('admin');
Route::get('/Album/{id}','AlbumController@show')->name('albumShow')->withoutMiddleware('admin');
Route::post('/Album/store','AlbumController@store')->name('albumStore');
Route::get('/Album/edit/{id}','AlbumController@edit')->name('albumEdit');
Route::put('/Album/edit/{id}','AlbumController@update')->name('albumUpdate');
Route::delete('/Album/delete/{id}','AlbumController@delete')->name('albumDelete');


Route::get('/Movie','MovieController@index')->name('movieIndex')->withoutMiddleware('admin');
Route::get('/Movie/create','MovieController@create')->name('movieCreation');
Route::get('/Movie/search','MovieController@search')->name('movieSearch')->withoutMiddleware('admin');
Route::get('/Movie/{id}','MovieController@show')->name('movieShow')->withoutMiddleware('admin');
Route::post('/Movie/store','MovieController@store')->name('movieStore');
Route::get('/Movie/edit/{id}','MovieController@edit')->name('movieEdit');
Route::put('/Movie/edit/{id}','MovieController@update')->name('movieUpdate');
Route::delete('/Movie/delete/{id}','MovieController@delete')->name('movieDelete');

Auth::routes();

Route::get('/User/Book/Album/{albumId}','BookController@bookAlbum')->name('bookAlbum');
Route::get('/User/Book/Movie/{movieId}','BookController@bookMovie')->name('bookMovie');
Route::get('/Book','BookController@index')->name('bookIndex')->middleware('admin');

Route::get('/User/books','BookController@showBooksForUser')->name('userBooks');
Route::delete('/User/books/Album/delete/{id}','BookController@deleteBookedAlbum')->name('albumBookedDeleteForUser');
Route::delete('/User/books/Movie/delete/{id}','BookController@deleteBookedMovie')->name('movieBookedDeleteForUser');

Route::get('/Admin/register','AdminController@create')->name('adminCreation');
Route::post('/Admin/store','AdminController@store')->name('adminStore');
Route::get('/Admin/books/search/user','BookController@searchBooksForUser')->name('bookSearchUser')->middleware('admin');
Route::get('/Admin/books/search/product','BookController@searchBookedProduct')->name('bookSearchProduct')->middleware('admin');
Route::delete('/Admin/books/delete/Movie/{id}/User/{userId}','AdminController@deleteBookedMovieForUser')->name('adminBookedMovieDelete');
Route::delete('/Admin/books/delete/Album/{id}/User/{userId}','AdminController@deleteBookedAlbumForUser')->name('adminBookedAlbumDelete');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/Token','TokenController@show')->name('token')->middleware('login');