<?php

// namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;

// class Authenticate extends Middleware
// {
//     /**
//      * Get the path the user should be redirected to when they are not authenticated.
//      */
//     protected function redirectTo($request): ?string
//     {
//         // Nếu request không phải AJAX, chuyển hướng về trang login
//         return $request->expectsJson() ? null : route('login');
//     }
// }

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
