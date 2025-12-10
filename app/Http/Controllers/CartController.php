<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // ================================
    // HIỂN THỊ GIỎ HÀNG
    // ================================
    public function index()
    {
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('cart.index', compact('cart', 'total'));
    }

    // ================================
    // THÊM SẢN PHẨM (KHÔNG ĐỤNG GÌ)
    // ================================
    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float) $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success'  => true,
            'cart_count' => count($cart),
        ]);
    }

    // ================================
    // CẬP NHẬT SỐ LƯỢNG (+1 hoặc -1)
    // ================================
    public function update(Request $request, $id)
    {
        $cart = session('cart', []);

        if (!isset($cart[$id])) {
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm không tồn tại trong giỏ'
            ]);
        }

        $change = (int) $request->change;
        $newQty = $cart[$id]['quantity'] + $change;

        // Nếu số lượng < 1 → xóa
        if ($newQty <= 0) {
            unset($cart[$id]);
        } else {
            $cart[$id]['quantity'] = $newQty;
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'newQuantity' => $newQty > 0 ? $newQty : 0,
            'totalPrice' => collect($cart)->sum(fn($i) => $i['price'] * $i['quantity'])
        ]);
    }

    // ================================
    // XOÁ MỘT SẢN PHẨM
    // ================================
    public function remove($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true]);
    }

    // ================================
    // XÓA TẤT CẢ
    // ================================
    public function clear()
    {
        session()->forget('cart');
        return response()->json(['success' => true]);
    }
}
