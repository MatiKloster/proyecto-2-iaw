<?php

namespace App\Http\Controllers;

use App\User;
use App\Album;
use App\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
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
            $user->movies()->attach($movieId);

            $movie->quantity -= 1;
            $movie->save();

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
            $user->albums()->attach($albumId);

            $album->quantity -= 1;
            $album->save();

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
        //dd($movies,$albums);
        return view('user.books', compact('albums', 'movies'));
    }

    public function deleteBookedAlbum($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $album = Album::findOrFail($id);

        $user->albums()->detach($id);
        $album->quantity += 1;

        $album->save();
        return back()->with('success', 'Cancelaste la reserva del disco con exito!');
    }

    public function deleteBookedMovie($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $movie = Movie::findOrFail($id);

        $user->movies()->detach($id);
        $movie->quantity += 1;

        $movie->save();
        return back()->with('success', 'Cancelaste la reserva de la pelicula con exito!');
    }

    public function getBookedAlbumsForUser($userId)
    {
        $user = User::findOrFail($userId);
        $albums = $user->albums()->get();

        return $albums;
    }

    public function getBookedMoviesForUser($userId)
    {
        $user = User::findOrFail($userId);
        $movies = $user->movies()->get();

        return $movies;
    }

    private function getBookedAlbumsView()
    {
        return  DB::table('album_user')
            ->join('albums', 'album_user.album_id', '=', 'albums.id')
            ->join('users', 'album_user.user_id', '=', 'users.id')
            ->select('users.name as userName', 'album_user.created_at as createdAt', 'albums.name as albumName')
            ->get();
    }

    private function getBookedMoviesView()
    {
        return  DB::table('movie_user')
            ->join('movies', 'movie_user.movie_id', '=', 'movies.id')
            ->join('users', 'movie_user.user_id', '=', 'users.id')
            ->select('users.name as userName', 'movie_user.created_at as createdAt', 'movies.name as movieName')
            ->get();
    }
}
