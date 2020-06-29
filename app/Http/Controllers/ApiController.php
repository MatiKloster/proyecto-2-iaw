<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Resources\Movie as MovieResource;
use App\Album;
use App\Http\Resources\Movie as AlbumResource;
use App\Http\Resources\Image as ImageResource;
use App\User;
use App\Http\Resources\AlbumCollection;
use App\Http\Resources\MovieCollection;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function movies(){
        return new MovieCollection(Movie::all());
    }
    public function movie($id){
        return new MovieResource(Movie::findOrFail($id));
    }
    public function movieImage($id){
        return new ImageResource(Movie::findOrFail($id));
    }
    
    public function albums(){
        return new AlbumCollection(Album::all());
    }
    
    public function album($id){
        return new AlbumResource(Album::findOrFail($id));
    }

    public function albumImage($id){
        return new ImageResource(Album::findOrFail($id));
    }

    public function userAlbumbooks($id){
        $user = User::findOrFail($id);
        $albums = $user->albums()->get();

        return new AlbumCollection($albums);
    }
    public function userMoviebooks($id){
        $user = User::findOrFail($id);
        $albums = $user->movies()->get();

        return new MovieCollection($albums);
    }
}
