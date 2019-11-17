<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class Authenticate
{
    /**
     * Check if the user is authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('authenticated')){
            return $next($request);
        }else{
            $request->session()->put('loginRedirect',Route::current()->uri());
            return redirect('login');
        }
    }
}
