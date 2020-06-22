<?php

namespace App\Http\Controllers;

use App\User;
use App\Album;
use App\Movie;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function bookMovie($movieId,$userId){
        $user=User::findOrFail($userId);
        $movie=Movie::findOrFail($movieId);

        $exists = $user->movies()->where('movie_id', $movieId)->exists();

        if((!$exists) && $movie->quantity > 0){
            $user->movies()->sync($movieId);

            $movie->quantity-=1;
            $movie->save();

            return back()->with('success','Has reservado la película con exito! :)');
        }
        else{
            
            return back()->with('fail','No se ha podido reservar la pelicula! :(');
        }
    }

    public function bookAlbum($albumId,$userId){
        $user=User::findOrFail($userId);
        $album=Album::findOrFail($albumId);
        
        $exists = $user->albums()->where('album_id', $albumId)->exists();

        if((!$exists) && ($album->quantity > 0)){
            $user->albums()->sync($albumId);
            
            $album->quantity-=1;
            $album->save();

            return back()->with('success','Has reservado el disco con exito! :)');
        }
        else{
            return back()->with('fail','No se ha podido reservar el disco! :(');
        }
    }

    public function showAllBooks(){

    }
    
    public function showBookedAlbumsForUser($userId){
        
        $user=User::findOrFail($userId);
        $albums=$user->albums();

        return $albums;
    }
    
    public function showBookedMoviesForUser($userId){
        $user=User::findOrFail($userId);
        $movies=$user->movies();

        return $movies;
    }

    public function showBookedMovies(){
        $movies=Movie::with('users');
        return $movies;

    }
    public function showBookedAlbums(){
        $albums=Album::with('users');
        return $albums;
    }



}
