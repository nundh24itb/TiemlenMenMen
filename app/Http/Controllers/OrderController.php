<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function userOrders(Request $request)
    {
        $status = $request->get('status');

        $orders = Order::where('user_id', Auth::id())
                    ->when($status, fn($q) => $q->where('status', $status))
                    ->latest()
                    ->paginate(10);

        return view('account.orders', compact('orders', 'status'));
    }
    // =========================
    // LỊCH SỬ ĐƠN HÀNG (USER + ADMIN)
    // =========================
    public function index(Request $request)
    {
        $status = $request->query('status'); // pending, shipping, completed, canceled

        // Admin xem tất cả
        if (Auth::user()->role === 'admin') {
            $orders = Order::when($status, function ($q) use ($status) {
                    return $q->where('status', $status);
                })
                ->latest()
                ->paginate(15);
        }
        // User chỉ xem đơn của mình
        else {
            $orders = Order::where('user_id', Auth::id())
                ->when($status, fn($q) => $q->where('status', $status))
                ->latest()
                ->paginate(15);
        }

        return view('orders.index', compact('orders', 'status'));
    }

    // =========================
    // XEM CHI TIẾT ĐƠN
    // =========================
    public function show(Order $order)
    {
        // Không phải admin + không phải đơn của user → chặn
        if (Auth::user()->role !== 'admin' && $order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }

    // =========================
    // ADMIN – SỬA ĐƠN
    // =========================
    public function edit(Order $order)
    {
        $this->authorize('update', $order);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $this->authorize('update', $order);

        $data = $request->validate([
            'status' => 'required|string',
            'note'   => 'nullable|string'
        ]);

        $order->update($data);

        return redirect()
            ->route('orders.show', $order->id)
            ->with('success', 'Cập nhật trạng thái đơn hàng thành công');
    }

    // =========================
    // ADMIN – XOÁ ĐƠN
    // =========================
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);

        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Xóa đơn hàng thành công');
    }
}
