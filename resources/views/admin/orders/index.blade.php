{{-- resources/views/admin/orders/index.blade.php --}}
@extends('layouts.admin') {{-- hoặc admin.blade nếu bạn đặt tên vậy --}}

@section('title', 'Quản lý đơn hàng')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">

            @if(session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <table class="min-w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Người đặt</th>
                        <th class="px-4 py-2 border">Số điện thoại</th>
                        <th class="px-4 py-2 border">Địa chỉ giao hàng</th>
                        <th class="px-4 py-2 border">Tổng tiền</th>
                        <th class="px-4 py-2 border">Trạng thái</th>
                        <th class="px-4 py-2 border">Ngày tạo</th>
                        <th class="px-4 py-2 border">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="px-4 py-2 border">{{ $order->id }}</td>
                        <td class="px-4 py-2 border">{{ $order->customer_name }}</td>
                        <td class="px-4 py-2 border">{{ $order->customer_phone }}</td>
                        <td class="px-4 py-2 border">{{ $order->shipping_address }}</td>
                        <td class="px-4 py-2 border">{{ number_format($order->subtotal + $order->shipping_fee + $order->tax) }} đ</td>
                        <td class="px-4 py-2 border">{{ $order->status }}</td>
                        <td class="px-4 py-2 border">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="text-blue-500 hover:underline">Sửa</a>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline" onclick="return confirm('Xóa đơn hàng này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Quản lý đơn hàng</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Người đặt</th>
                            <th class="px-4 py-2 border">Số điện thoại</th>
                            <th class="px-4 py-2 border">Địa chỉ giao hàng</th>
                            <th class="px-4 py-2 border">Tổng tiền</th>
                            <th class="px-4 py-2 border">Trạng thái</th>
                            <th class="px-4 py-2 border">Ngày tạo</th>
                            <th class="px-4 py-2 border">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="px-4 py-2 border">{{ $order->id }}</td>
                            <td class="px-4 py-2 border">{{ $order->customer_name }}</td>
                            <td class="px-4 py-2 border">{{ $order->customer_phone }}</td>
                            <td class="px-4 py-2 border">{{ $order->shipping_address }}</td>
                            <td class="px-4 py-2 border">{{ number_format($order->subtotal + $order->shipping_fee + $order->tax) }} đ</td>
                            <td class="px-4 py-2 border">{{ $order->status }}</td>
                            <td class="px-4 py-2 border">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="text-blue-500 hover:underline">Sửa</a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:underline" onclick="return confirm('Xóa đơn hàng này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout> --}}


