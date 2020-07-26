<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    public function getToken(Request $request)
    {
        $email = $request->header('email');
        $password = $request->header('password');
        
        $response =  $this->generateResponse($email,$password);
        
        if(array_key_exists('error', $response))
        {
            return response( $response, 401);
        }

        return response($response,200);
    }
    private function refreshToken($user)
    {
        $token = Str::random(60);
        $hashedToken=hash('sha256', $token);
        $user->forceFill([
            'api_token' => $hashedToken,
        ])->save();

        return $hashedToken;
    }
    public function show()
    {
        $email = Auth::user()->email;
        $password = Auth::user()->password;

        $token = $this->generateResponse($email,$password);
        
        return view('shared.token',['token' => $token['api_token']]);
    }
    private function generateResponse($email,$password)
    {
        $user = User::where('email', '=', $email)->first();

        if($user != null && (Hash::check($password, $user->password) || $password == $user->password))
        {
            return ['id' => $user->id, 'name'=>$user->name ,'api_token' => $this->refreshToken($user)];
        }
        else
        {
            return ['error' => 'Unauthenticated.'];
        }
    }
}
