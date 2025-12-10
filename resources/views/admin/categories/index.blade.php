@extends('layouts.admin')

@section('content')
<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">Quản lý danh mục</h1>

    <a href="{{ route('admin.categories.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Thêm danh mục
    </a>

    <table class="min-w-full mt-6 bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="p-2 text-left">ID</th>
                <th class="p-2 text-left">Tên danh mục</th>
                <th class="p-2 text-left">Ngày tạo</th>
                <th class="p-2 text-left">Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $cate)
            <tr class="border-b">
                <td class="p-2">{{ $cate->id }}</td>
                <td class="p-2">{{ $cate->name }}</td>
                <td class="p-2">{{ $cate->created_at->format('d/m/Y') }}</td>

                <td class="p-2">
                    <a href="{{ route('admin.categories.edit', $cate->id) }}"
                       class="text-yellow-600 hover:underline mr-3">
                       Sửa
                    </a>

                    <form action="{{ route('admin.categories.destroy', $cate->id) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline"
                                onclick="return confirm('Xóa danh mục này?');">
                            Xóa
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
