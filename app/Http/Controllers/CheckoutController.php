<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Trang checkout
    public function index()
    {
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('checkout.index', compact('cart', 'total'));
    }

    // Xử lý đặt hàng
    public function placeOrder(Request $request)
{
    $data = $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_email' => 'nullable|email',
        'customer_phone' => 'nullable|regex:/^0[0-9]{9}$/',
        'shipping_address' => 'required|string',
    ]);

    $cart = session('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Giỏ hàng rỗng');
    }

    $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    $shipping_fee = 0; // tính sau cũng được
    $tax = 0;

    DB::beginTransaction();
    try {
        $order = Order::create([
            'user_id' => auth()->id(),
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_phone' => $data['customer_phone'],
            'shipping_address' => $data['shipping_address'],
            'subtotal' => $subtotal,
            'shipping_fee' => $shipping_fee,
            'tax' => $tax,
            'total' => $subtotal + $shipping_fee + $tax,
            'status' => 'pending',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        DB::commit();

        session()->forget('cart');
        return redirect('/')->with('success', 'Đặt hàng thành công!');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('checkout.index')->with('error', 'Lỗi: ' . $e->getMessage());
    }
}
}
