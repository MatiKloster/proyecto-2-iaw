<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Http\Resources\Movie as MovieResource;
use App\Album;
use App\Http\Resources\Movie as AlbumResource;
use App\Http\Resources\Image as ImageResource;
use App\User;
use App\Http\Resources\AlbumCollection;
use App\Http\Resources\BookCollection;
use App\Http\Resources\MovieCollection;
use App\Traits\Bookings;

class ApiController extends Controller
{
    use Bookings;
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
        
        $albums = $this->getBookedAlbumsForUser($id); // trait method

        return new AlbumCollection($albums);
    }
    public function userMoviebooks($id){
        $movies = $this->getBookedMoviesForUser($id); //trait mehtod

        return new MovieCollection($movies);
    }

    public function allBookings(){
        $products = $this->getBookedAlbumsView();
        $movies = $this->getBookedMoviesView();
        $products->merge($movies);
        return new BookCollection($products);
    }
}
