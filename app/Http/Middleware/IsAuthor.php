<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAuthor
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
        // return $next($request);
        if (Auth::user() &&  (Auth::user()->role == 'author' || Auth::user()->role == 'admin')) {
            return $next($request);
        }
        return redirect('/account');
    }
}
