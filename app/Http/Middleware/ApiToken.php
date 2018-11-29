<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ApiToken
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
        
        if(!$request->header('token')){

            return response()->json([
                'error'=>'No token'
            ],403);
        }else{
            $user=User::where('token',$request->token)->first();
            if(!$user){
                return response()->json([
                    'error'=>'Invalid token'
                ],403);
            }
        }
        return $next($request);
        
    }
}
