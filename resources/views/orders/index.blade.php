<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $orders = Order::latest()->paginate(15);
        } else {
            $orders = Order::where('user_id', Auth::id())
                        ->latest()
                        ->paginate(15);
        }

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if (Auth::user()->role != 'admin' && $order->user_id != Auth::id()) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }


    public function edit(Order $order)
    {
        // admin only
        $this->authorize('update', $order);
        return view('orders.edit', compact('order'));
    }


    public function update(Request $request, Order $order)
    {
        $this->authorize('update', $order);
        $data = $request->validate([ 'status' => 'required|string' , 'note' => 'nullable|string' ]);
        $order->update($data);
        return redirect()->route('orders.show', $order->id)->with('success', 'Cập nhật đơn hàng thành công');
    }

    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Đã xóa đơn');
    }
}

