<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    
    {

        //dd(Auth::check());

        if(Auth::check()){
            if (Auth::user()->role == User::UserRole['HospitalAdmin']){
                return $next($request);
            }
        }
     
        return response('Forbidden Route');
        
    }
}
