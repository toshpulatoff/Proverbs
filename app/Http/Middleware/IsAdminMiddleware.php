<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->roles->contains('name', 'administrator')) {
            return $next($request);
        }

        // Redirect or return response for non-admin users
        //return redirect()->route('home')->with('error', 'Unauthorized access.');
        return abort(403);
    }
}
