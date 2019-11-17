<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AuthenticateBDECESI
{
    /**
     * Check if the user is a BDE member or an employee.
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
