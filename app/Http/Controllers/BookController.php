<?php

namespace App\Http\Controllers;

use App\User;
use App\Album;
use App\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Traits\Bookings;

class BookController extends Controller
{   
    use Bookings;

    public function __construct()
    {
        $this->middleware('login');
    }
    public function bookMovie($movieId)
    {
        $user = User::findOrFail(Auth::user()->id);
        $movie = Movie::findOrFail($movieId);

        $exists = $user->movies()->where('movie_id', $movieId)->exists();

        if ((!$exists) && $movie->quantity > 0) {
            DB::transaction(function () use ($user, $movieId, $movie) {
                $user->movies()->attach($movieId);

                $movie->quantity -= 1;
                $movie->save();
            });

            return back()->with('success', 'Has reservado la película con exito! :)');
        } else {
            return back()->with('fail', 'No se ha podido reservar la pelicula! :(');
        }
    }

    public function bookAlbum($albumId)
    {
        $user = User::findOrFail(Auth::user()->id);
        $album = Album::findOrFail($albumId);

        $exists = $user->albums()->where('album_id', $albumId)->exists();

        if ((!$exists) && ($album->quantity > 0)) {
            DB::transaction(function () use ($user, $albumId, $album) {
                $user->albums()->attach($albumId);

                $album->quantity -= 1;
                $album->save();
            });

            return back()->with('success', 'Has reservado el disco con exito! :)');
        } else {
            return back()->with('fail', 'No se ha podido reservar el disco! :(');
        }
    }

    public function index()
    {

        $albums = $this->getBookedAlbumsView();

        $movies = $this->getBookedMoviesView();

        return view('book.index', compact('albums', 'movies'));
    }

    public function showBooksForUser()
    {
        $albums = $this->getBookedAlbumsForUser(Auth::user()->id);

        $movies = $this->getBookedMoviesForUser(Auth::user()->id);
        return view('user.books', compact('albums', 'movies'));
    }

    public function deleteBookedAlbum($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $album = Album::findOrFail($id);

        DB::transaction(function () use ($user, $id, $album) {
            $user->albums()->detach($id);
            $album->quantity += 1;

            $album->save();
        });

        return back()->with('success', 'Cancelaste la reserva del disco con exito!');
    }

    public function deleteBookedMovie($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $movie = Movie::findOrFail($id);

        DB::transaction(function () use ($user, $id, $movie) {
            $user->movies()->detach($id);
            $movie->quantity += 1;

            $movie->save();
        });

        return back()->with('success', 'Cancelaste la reserva de la pelicula con exito!');
    }

    public function searchBooksForUser()
    {
        $username=$_GET['searchUser'];
        if($username!=""){
            $albums = $this->getBookedAlbumsView()->filter(function ($user) use ($username){
                return false !== strstr($user->userName, $username);
            });

            $movies = $this->getBookedMoviesView()->filter(function ($user) use ($username){
                return false !== strstr($user->userName, $username);
            });

            return view('book.index', compact('albums', 'movies'));
        }
        else{
            return redirect()->route('bookIndex');
        }
         
    }

    public function searchBookedProduct()
    {   
        $prodName=$_GET['searchProduct'];
        if($prodName!=""){
            $albums = $this->getBookedAlbumsView()->filter(function ($album) use ($prodName){
                return false !== stristr($album->albumName, $prodName);
            });
            
            $movies = $this->getBookedMoviesView()->filter(function ($movie) use ($prodName){
                return false !== stristr($movie->movieName, $prodName);
            });
            
            return view('book.index', compact('albums', 'movies'));
        }
        else{
            return redirect()->route('bookIndex');
        }
   }
}
