{{-- @extends('layouts.app')

@section('content')
<h1>{{ $product->name }}</h1>
<img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-96">
<p>Danh mục: {{ $product->category }}</p>
<p>Giá: {{ $product->price }} VND</p>
<p>Mô tả: {{ $product->description }}</p>
<form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit">Thêm vào giỏ hàng</button>
</form>
@endsection --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="mb-4 w-96">

                <p><strong>Danh mục:</strong> {{ $product->category }}</p>
                <p><strong>Giá:</strong> {{ $product->price }} VND</p>
                <p><strong>Mô tả:</strong> {{ $product->description }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-white bg-pink-500 rounded hover:bg-pink-600">
                        Thêm vào giỏ hàng
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center p-6 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="mb-4 rounded w-96">

                <p class="mb-2"><strong>Danh mục:</strong> {{ $product->category ?? 'Không có' }}</p>
                <p class="mb-2"><strong>Giá:</strong> {{ $product->price }} VND</p>
                <p class="mb-4"><strong>Mô tả:</strong> {{ $product->description }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-6 py-2 text-white bg-pink-500 rounded hover:bg-pink-600">
                        Thêm vào giỏ hàng
                    </button>
                </form>

                <a href="{{ route('products.index') }}" class="mt-4 text-pink-600 hover:underline">
                    ← Quay về danh sách sản phẩm
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
