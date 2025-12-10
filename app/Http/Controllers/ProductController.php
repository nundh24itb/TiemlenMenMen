<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Trang chủ
    public function home() {
        $products = Product::latest()->take(6)->get();
        return view('home', compact('products'));
    }

    // Danh sách sản phẩm
    public function index() {
        // $products = Product::paginate(9);
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Chi tiết sản phẩm
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Admin: danh sách + form thêm
    public function admin() {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    // Admin: thêm sản phẩm
    public function store(Request $r) {
        Product::create([
            'name' => $r->name,
            'price' => $r->price,
            'description' => $r->description,
            'image' => $r->image,
        ]);
        return back()->with('ok', 'Thêm sản phẩm thành công!');
    }

    // Admin: xóa
    public function destroy($id) {
        Product::findOrFail($id)->delete();
        return back()->with('ok', 'Xóa thành công!');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $products = \App\Models\Product::where('name', 'like', "%{$query}%")
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('products.index', compact('products', 'query'));
    }
}
