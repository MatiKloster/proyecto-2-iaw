<?php

use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Movie;
use App\Album;
use App\Http\Resources\AlbumCollection;
use App\Http\Resources\MovieCollection;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/movies', 'ApiController@movies');
Route::get('/movies/{id}', 'ApiController@movie');
Route::get('/movies/image/{id}', 'ApiController@movieImage');

Route::get('/albums', 'ApiController@albums');
Route::get('/albums/{id}', 'ApiController@album');
Route::get('/albums/image/{id}', 'ApiController@albumImage');

Route::get('/user/albums/{id}', 'ApiController@userAlbumBooks');
Route::get('/user/movies/{id}', 'ApiController@userMovieBooks');

