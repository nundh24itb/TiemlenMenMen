@extends('layouts.admin')

@section('content')
<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold">Quản lý sản phẩm</h1>
    <a href="{{ route('admin.products.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        + Thêm sản phẩm
    </a>
</div>

<table class="w-full bg-white rounded shadow overflow-hidden">
    <thead class="bg-gray-200">
        <tr>
            <th class="px-4 py-2 text-left">ID</th>
            <th class="px-4 py-2 text-left">Tên</th>
            <th class="px-4 py-2 text-left">Giá</th>
            <th class="px-4 py-2 text-left">Danh mục</th>
            <th class="px-4 py-2 text-left">Ảnh</th>
            <th class="px-4 py-2 text-left">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $p)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $p->id }}</td>
            <td class="px-4 py-2">{{ $p->name }}</td>
            <td class="px-4 py-2">{{ number_format($p->price) }}đ</td>
            <td class="px-4 py-2">{{ $p->category->name }}</td>
            <td class="px-4 py-2">
                <img src="{{ asset('uploads/'.$p->image) }}" class="w-16 h-16 object-cover rounded">
            </td>
            <td class="px-4 py-2 flex space-x-2">
                <a href="{{ route('admin.products.edit', $p->id) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Sửa</a>
                <form action="{{ route('admin.products.destroy', $p->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
