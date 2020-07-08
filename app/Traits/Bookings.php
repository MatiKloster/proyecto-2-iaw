<?php
namespace App\Traits;
use Illuminate\Support\Facades\DB;
use App\User;
trait Bookings
{
    public function getBookedAlbumsView()
    {
        return  DB::table('album_user')
            ->join('albums', 'album_user.album_id', '=', 'albums.id')
            ->join('users', 'album_user.user_id', '=', 'users.id')
            ->select('users.name as userName', 'album_user.created_at as createdAt', 'albums.name as name','users.id as userId','albums.id as id')
            ->get();
    }

    public function getBookedMoviesView()
    {
        return  DB::table('movie_user')
            ->join('movies', 'movie_user.movie_id', '=', 'movies.id')
            ->join('users', 'movie_user.user_id', '=', 'users.id')
            ->select('users.name as userName', 'movie_user.created_at as createdAt', 'movies.name as name','users.id as userId','movies.id as id')
            ->get();
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
} 