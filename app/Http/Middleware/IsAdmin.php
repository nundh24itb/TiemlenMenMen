<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class IsAdmin
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//     public function handle(Request $request, Closure $next)
//     {
//         // Kiểm tra user đã đăng nhập và có role là admin
//         if (Auth::check() && Auth::user()->role === 'admin') {
//             return $next($request);
//         }

//         // Nếu không phải admin, redirect về trang home hoặc login
//         return redirect('/')->with('error', 'Bạn không có quyền truy cập!');
//     }
// }

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}


