<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class adminAPI
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $token = $request ->bearerToken();
        $user = User::all()->where('isAdmin',true)->where('api_token','=',$token)->first();
        if( $user != null)
        {
            return $next($request);
        }
        else{
            return response('Unauthorized.',401);
        }
    }
}
