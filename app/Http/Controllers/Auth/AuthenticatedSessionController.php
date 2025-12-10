<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    // Hiển thị trang login
    public function create()
    {
        return view('auth.login');
    }

    // Xử lý login
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // if (!Auth::attempt($credentials, $request->boolean('remember'))) {
        //     return back()->withErrors([
        //         'email' => 'Thông tin đăng nhập không chính xác!',
        //     ])->onlyInput('email');
        // }

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Kiểm tra role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard'); // route admin
            }

            return redirect()->intended('dashboard'); // user bình thường
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ]);

        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    // Xử lý logout
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Chuyển về trang chủ và hiện thông báo
        return redirect('/')->with('success', 'Bạn đã đăng xuất thành công!');
    }
}
