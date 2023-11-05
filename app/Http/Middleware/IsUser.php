<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{

    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check the user's role and redirect accordingly
            if ($user->hasRole() === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->hasRole === 'user') {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
