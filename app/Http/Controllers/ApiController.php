<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;
use App\Http\Resources\Movie as MovieResource;
use App\Album;
use App\Http\Resources\Movie as AlbumResource;
use App\Http\Resources\Image as ImageResource;
use App\Http\Resources\AlbumCollection;
use App\Http\Resources\BookCollection;
use App\Http\Resources\MovieCollection;
use App\Traits\Bookings;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use Bookings;
    public function __construct()
    {
        $this->middleware('userAPI');
    }
    public function movies()
    {
        return new MovieCollection(Movie::all()->sortBy('id'));
    }
    public function movie($id)
    {
        return new MovieResource(Movie::findOrFail($id));
    }
    public function movieImage($id)
    {
        return new ImageResource(Movie::findOrFail($id));
    }
    
    public function albums()
    {
        return new AlbumCollection(Album::all()->sortBy('id'));
    }
    
    public function album($id)
    {
        return new AlbumResource(Album::findOrFail($id));
    }

    public function albumImage($id)
    {
        return new ImageResource(Album::findOrFail($id));
    }
    public function userAlbumbooks(Request $request,$id)
    {
        if($this->validateThis($request,$id))
        {
            $albums = $this->getBookedAlbumsForUser($id); 
            return new AlbumCollection($albums);
        }
        else
        {
            return response('Unauthorized.',401);
        }
    }
    public function userMoviebooks(Request $request,$id)
    {
        if($this->validateThis($request,$id))
        {
            $movies = $this->getBookedMoviesForUser($id); //trait mehtod
            return new MovieCollection($movies);
        }
        else
        {
            return response('Unauthorized.',401);
        }
    }
    public function allBookings()
    {
        $products = $this->getBookedAlbumsView();
        $movies = $this->getBookedMoviesView();
        $products->merge($movies);
        return new BookCollection($products);
    }
    private function getUserFromToken($token)
    {
        return User::all()->where('api_token','=',$token)->first();
    }
    private function validateThis($request,$id){
        $token = $request ->bearerToken();

        $user = $this->getUserFromToken($token);
        
        return ($user->id ==  $id)? true :false;
    }
}
