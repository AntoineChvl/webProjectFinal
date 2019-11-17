<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AuthenticateBDECESI
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
        if(User::auth() && (User::auth()->statusLvl == 2 || User::auth()->statusLvl == 3))
        {
            return $next($request);
        } else
        {
            return redirect('login');
        }

    }
}
