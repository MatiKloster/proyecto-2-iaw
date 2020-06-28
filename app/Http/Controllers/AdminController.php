<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Hash;
use App\Album;
use App\Movie;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function create(){
        return view('admin.register');
    }

    public function store(Request $request){
    
        $data=$this->getValidation($request);
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isAdmin' => $data['isAdmin'] ?? false,
        ]);
        if($user->isAdmin)
        {
            $user->forceFill([
                'api_token' => hash('sha256', $user->name.$user->email)
            ])->save();
        }
        

        return back()->with('success','Se registró el usuario con éxito!'.$user->isAdmin? 'Token de Admin: '.$user->api_token: '');
    }

    public function deleteBookedAlbumForUser($id,$userId)
    {
        $user = User::findOrFail($userId);
        $album = Album::findOrFail($id);

        DB::transaction(function () use ($user, $id, $album) {
            $user->albums()->detach($id);
            $album->quantity += 1;

            $album->save();
        });

        return back()->with('success', 'Cancelaste la reserva del disco con exito!');
    }

    public function deleteBookedMovieForUser($id,$userId)
    {
        $user = User::findOrFail($userId);
        $movie = Movie::findOrFail($id);

        DB::transaction(function () use ($user, $id, $movie) {
            $user->movies()->detach($id);
            $movie->quantity += 1;

            $movie->save();
        });

        return back()->with('success', 'Cancelaste la reserva de la pelicula con exito!');
    }

    private function getValidation(Request $request){
        return $request->validate([
            'name'=>'required|string|max:255',
            'email'=>"required|string|email|unique:users|max:255",
            'password'=>'required|string|min:8|confirmed'
        ]);
    }
}
