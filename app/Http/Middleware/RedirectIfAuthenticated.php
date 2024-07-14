<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::check()) {
            if (Auth::user()->restaurant_id) {
                return redirect('/dashboard/index3'); // Vendor dashboard route
            } else {
                return redirect('/index2'); // User landing page route
            }
        }

        return $next($request);
    }
}
