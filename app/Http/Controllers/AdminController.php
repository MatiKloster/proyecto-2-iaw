<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Hash;

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
            'isAdmin' => $data['isAdmin'],
        ]);
        return back()->with('success','Se registró el usuario con éxito!');
    }
    private function getValidation(Request $request){
        return $request->validate([
            'name'=>'required|string|max:255',
            'email'=>"required|string|email|unique:users|max:255",
            'password'=>'required|string|min:8|confirmed',
            'isAdmin' => 'required'
        ]);
    }
}
