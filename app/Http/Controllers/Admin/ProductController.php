<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Product;

// class ProductController extends Controller
// {
//     // Chỉ admin mới vào được (nếu bạn có middleware auth + role)
//     public function __construct()
//     {
//         // $this->middleware('auth');
//         // $this->middleware(['auth', 'is_admin']);

//     }
//     //Hiển thị danh sách sản phẩm
//     public function index()
//     {
//         //
//         $products = Product::all();
//         return view('admin.products.index', compact('products'));
//     }

//     //Form thêm sản phẩm mới
//     public function create()
//     {
//         return view('admin.products.create');
//     }

//     //Lưu sản phẩm mới
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name'=>'required',
//             'price'=>'required|numeric',
//             'image'=>'nullable|image|max:2048',
//         ]);

//         $data = $request->only(['name','price']);

//         if($request->hasFile('image')){
//             $data['image'] = $request->file('image')->store('products', 'public');
//         }

//         Product::create($data);
//         return redirect()->route('admin.products.index')->with('success','Thêm sản phẩm thành công!');
//     }

//     //
//     public function show(string $id)
//     {
//         //
//     }

//     //Form sửa sản phẩm
//     public function edit(string $id)
//     {
//         return view('admin.products.edit', compact('product'));
//     }

//    //Cập nhật sản phẩm
//     public function update(Request $request, string $id)
//     {
//         $product = Product::findOrFail($id);
//         $request->validate([
//             'name'=>'required',
//             'price'=>'required|numeric',
//             'image'=>'nullable|image|max:2048',
//         ]);

//         $data = $request->only(['name','price']);

//         if($request->hasFile('image')){
//             $data['image'] = $request->file('image')->store('products', 'public');
//         }

//         $product->update($data);
//         return redirect()->route('admin.products.index')->with('success','Cập nhật sản phẩm thành công!');
//     }

//     //Xóa sản phẩm
//     public function destroy(string $id)
//     {
//         $product = Product::findOrFail($id);
//         $product->delete();
//         return redirect()->route('admin.products.index')->with('success','Xóa sản phẩm thành công!');
//     }
// }

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'category_id' => 'required',
            'image'       => 'required|image|mimes:jpg,jpeg,png',
        ]);

        // Upload ảnh
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'category_id' => $request->category_id,
            'image'       => $imageName,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'category_id' => 'required',
            'image'       => 'image|mimes:jpg,jpeg,png',
        ]);

        $imageName = $product->image;

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ
            if (file_exists(public_path('uploads/'.$product->image))) {
                unlink(public_path('uploads/'.$product->image));
            }
            // Upload ảnh mới
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        $product->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'category_id' => $request->category_id,
            'image'       => $imageName,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(Product $product)
    {
        if (file_exists(public_path('uploads/'.$product->image))) {
            unlink(public_path('uploads/'.$product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Đã xóa!');
    }
}
