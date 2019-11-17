<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Route;

class AuthenticateBDE
{
    /**
     * Check if the user is a BDE member.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(User::auth() && (User::auth()->statusLvl == 2))
        {
            return $next($request);
        } else
        {
            return redirect('login');
        }

    }
}
