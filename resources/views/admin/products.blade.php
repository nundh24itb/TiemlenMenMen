@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Quản lý sản phẩm</h2>

@if (session('ok'))
<p class="p-3 bg-green-200">{{ session('ok') }}</p>
@endif

<form method="POST" action="/admin/products/store" class="bg-white p-4 shadow rounded mb-5">
    @csrf
    <input name="name" placeholder="Tên sản phẩm" class="border p-2 block w-full mb-2">
    <input name="price" placeholder="Giá" class="border p-2 block w-full mb-2">
    <input name="image" placeholder="Link ảnh" class="border p-2 block w-full mb-2">
    <textarea name="description" placeholder="Mô tả" class="border p-2 w-full mb-2"></textarea>
    <button class="bg-pink-500 text-white px-4 py-2 rounded">Thêm</button>
</form>

<table class="w-full bg-white shadow rounded">
    <tr class="bg-pink-200">
        <th class="p-3">Tên</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th></th>
    </tr>

    @foreach ($products as $p)
    <tr class="border-b">
        <td class="p-3">{{ $p->name }}</td>
        <td>{{ number_format($p->price) }}đ</td>
        <td><img src="{{ $p->image }}" class="w-16"></td>
        <td>
            <form action="/admin/products/delete/{{ $p->id }}" method="POST">
                @csrf
                <button class="text-red-500">Xóa</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
