@extends('admin.layout')

@section('content')
<div class="p-6 bg-white shadow rounded w-1/2 mx-auto">

    <h2 class="text-xl font-bold mb-4">Thêm danh mục</h2>

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <label class="block mb-2 font-medium">Tên danh mục:</label>
        <input type="text" name="name"
               class="w-full border p-2 rounded mb-4"
               placeholder="Nhập tên danh mục" required>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Lưu
        </button>

        <a href="{{ route('admin.categories.index') }}"
           class="ml-3 text-gray-600">Quay lại</a>

    </form>
</div>
@endsection
