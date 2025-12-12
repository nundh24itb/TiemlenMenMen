<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function zalopayReturn(Request $request)
    {
        return redirect('/')->with('success', 'Thanh toán ZaloPay đã xử lý!');
    }
    public function momoReturn(Request $request)
    {
        if ($request->resultCode == 0) {
            return redirect('/')->with('success', 'Thanh toán MoMo thành công!');
        } else {
            return redirect('/')->with('error', 'Thanh toán MoMo thất bại!');
        }
    }
}
