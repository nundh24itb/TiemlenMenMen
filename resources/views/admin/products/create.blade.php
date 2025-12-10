@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Thêm sản phẩm</h1>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="block mb-1 font-medium">Tên sản phẩm</label>
        <input type="text" name="name" class="w-full border-gray-300 rounded p-2">
    </div>

    <div>
        <label class="block mb-1 font-medium">Giá</label>
        <input type="number" name="price" class="w-full border-gray-300 rounded p-2">
    </div>

    <div>
        <label class="block mb-1 font-medium">Danh mục</label>
        <select name="category_id" class="w-full border-gray-300 rounded p-2">
            @foreach ($categories as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1 font-medium">Ảnh</label>
        <input type="file" name="image" class="w-full border-gray-300 rounded p-2">
    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Thêm</button>
</form>
@endsection
