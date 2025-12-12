<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Kết quả tìm kiếm
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h3 class="mb-4 text-lg font-bold">Tìm thấy {{ $products->count() }} sản phẩm</h3>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                @foreach ($products as $p)
                    <div class="p-4 bg-white rounded shadow">
                        <img src="{{ asset('images/' . $p->image) }}" class="object-cover w-full h-40 rounded mb-2" />
                        <h3 class="font-bold">{{ $p->name }}</h3>
                        <p class="text-pink-600 font-semibold">{{ number_format($p->price) }}đ</p>
                        <a href="{{ route('products.show', $p->id) }}"
                           class="inline-block mt-2 px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
                            Xem chi tiết
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
