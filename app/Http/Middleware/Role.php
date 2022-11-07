<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if($request->user()->role == $role){
            return $next($request);
        }if(Auth::user()->role == 'ADMIN'){
            return Redirect::to('dashboard/admin');
        }elseif(Auth::user()->role == 'EMPLOYEE'){
            return Redirect::to('dashboard/member');
        }
        elseif(Auth::user()->role == 'COMPANY'){
            return Redirect::to('dashboard/company');
        }
    }
}
