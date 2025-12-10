{{-- resources/views/admin/orders/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Chỉnh sửa đơn hàng #' . $order->id)

@section('content')
<div class="py-6">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                Chỉnh sửa đơn hàng #{{ $order->id }}
            </h2>

            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700">Trạng thái</label>
                    <select name="status" class="border rounded w-full p-2">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                    @error('status')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Chỉnh sửa đơn hàng #{{ $order->id }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700">Trạng thái</label>
                        <select name="status" class="border rounded w-full p-2">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                        @error('status')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> --}}
