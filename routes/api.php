<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group([ 'middleware' => 'userAPI'], function()
{   
    Route::get('/movies', 'ApiController@movies');
Route::get('/movies/{id}', 'ApiController@movie');
Route::get('/movies/image/{id}', 'ApiController@movieImage');

Route::get('/albums', 'ApiController@albums');
Route::get('/albums/{id}', 'ApiController@album');
Route::get('/albums/image/{id}', 'ApiController@albumImage');

Route::get('/user/albums/{id}', 'ApiController@userAlbumBooks');
Route::get('/user/movies/{id}', 'ApiController@userMovieBooks');

Route::get('/bookings','ApiController@allBookings')->middleware('adminAPI');
});

Route::get('/user/token','TokenController@getToken');

