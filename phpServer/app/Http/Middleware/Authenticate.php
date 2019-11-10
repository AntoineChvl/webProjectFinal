<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class Authenticate
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
        if($request->session()->has('authenticated')){
            return $next($request);
        }else{
            $request->session()->put('loginRedirect',Route::current()->uri());
            return redirect('login');
        }
    }
}
