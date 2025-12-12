<x-app-layout>

    <section class="container mx-auto mt-10">

        <h2 class="text-2xl font-bold mb-6">
            Sản phẩm thuộc danh mục:
            <span class="text-pink-600">{{ $slug }}</span>
        </h2>

        @if($products->isEmpty())
            <p class="text-gray-500">Không có sản phẩm nào.</p>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                @foreach($products as $p)
                    <a href="{{ route('products.show', $p->id) }}"
                       class="block bg-white shadow rounded-lg p-4 hover:shadow-lg transition">

                        <img src="{{ asset('images/' . $p->image) }}"
                             class="w-full h-40 object-cover rounded">

                        <p class="mt-2 font-semibold">{{ $p->name }}</p>
                        <p class="text-pink-600 font-bold">{{ number_format($p->price) }} đ</p>
                    </a>
                @endforeach
            </div>
        @endif

    </section>

</x-app-layout>
