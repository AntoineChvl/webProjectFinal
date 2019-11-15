<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (User::auth()) {
            return redirect(route('home'));
        }
        return $next($request);
    }
}
