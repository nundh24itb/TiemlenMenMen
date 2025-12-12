<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Models\Order;


// class OrderController extends Controller
// {
//     public function __construct()
//     {
//         // Middleware đảm bảo chỉ admin mới vào được
//         $this->middleware(['auth', 'admin']);
//     }

//     /**
//      * Hiển thị danh sách tất cả đơn hàng
//      */
//     public function index()
//     {
//         $orders = Order::orderBy('created_at', 'desc')->get();
//         return view('admin.orders.index', compact('orders'));
//     }

//     /**
//      * Hiển thị form chỉnh sửa trạng thái đơn hàng
//      */
//     public function edit($id)
//     {
//         $order = Order::findOrFail($id);
//         return view('admin.orders.edit', compact('order'));
//     }

//     /**
//      * Cập nhật trạng thái đơn hàng
//      */
//     public function update(Request $request, $id)
//     {
//         $order = Order::findOrFail($id);

//         $request->validate([
//             'status' => 'required|string',
//         ]);

//         $order->status = $request->status;
//         $order->save();

//         return redirect()->route('admin.orders.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
//     }

//     /**
//      * Xóa đơn hàng
//      */
//     public function destroy($id)
//     {
//         $order = Order::findOrFail($id);
//         $order->delete();

//         return redirect()->route('admin.orders.index')->with('success', 'Xóa đơn hàng thành công.');
//     }
// }


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }
    public function edit($id)
{
    $order = Order::findOrFail($id);
    return view('admin.orders.edit', compact('order'));
}

public function update(Request $request, $id)
{
    $order = Order::findOrFail($id);
    // xử lý update dữ liệu
    $order->status = $request->status;
    $order->save();

    return redirect()->route('admin.orders.index')->with('success', 'Cập nhật đơn hàng thành công');
}
}
