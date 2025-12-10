@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Chỉnh sửa sản phẩm</h1>

    @if ($errors->any())
        <div class="bg-red-200 text-red-700 p-3 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Tên sản phẩm:</label>
            <input type="text" name="name" class="border p-2 w-full" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Giá:</label>
            <input type="number" name="price" class="border p-2 w-full" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Ảnh sản phẩm:</label>
            <input type="file" name="image" accept="image/*" class="border p-2 w-full">
            @if($product->image)
                <p class="mt-2">Ảnh hiện tại:</p>
                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" width="100">
            @endif
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Cập nhật sản phẩm
        </button>
    </form>
</div>
@endsection
