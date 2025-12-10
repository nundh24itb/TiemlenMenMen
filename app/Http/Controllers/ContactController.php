<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Hiển thị trang liên hệ
    public function index()
    {
        return view('contact.index'); // resources/views/contact.blade.php
    }

    // Xử lý form liên hệ
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Xử lý gửi email hoặc lưu vào DB
        // Mail::to('admin@example.com')->send(new ContactMail($request->all()));

        return back()->with('success', 'Cảm ơn bạn! Chúng tôi đã nhận được tin nhắn.');
    }
}
