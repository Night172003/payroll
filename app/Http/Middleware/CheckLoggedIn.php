<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLoggedIn
{
    public function handle($request, Closure $next)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            return $next($request);
        }

        // If not logged in, redirect to the login page
        return redirect()->route('login')->with('error', 'Unauthorized access');
    }
}