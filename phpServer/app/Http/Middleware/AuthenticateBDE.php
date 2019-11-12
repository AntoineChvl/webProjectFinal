<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Route;

class AuthenticateBDE
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
        if(User::auth() && User::auth()->status == "BDE")
        {
            return $next($request);
        } else
        {
            return redirect(url()->previous());
        }

    }
}
