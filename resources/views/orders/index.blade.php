<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold">Đơn hàng của tôi</h2>

            {{-- Nút quay lại --}}
            <a href="{{ url()->previous() }}"
               class="inline-flex items-center gap-2
                      px-4 py-2
                      bg-gray-200 text-gray-700
                      rounded-lg
                      hover:bg-gray-300 transition">
                ← Quay lại
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6 py-8">
        <table class="w-full bg-white shadow rounded-lg">
            <thead>
                <tr class="border-b">
                    <th class="p-3 text-left">Mã đơn</th>
                    <th class="p-3 text-center">Tổng tiền</th>
                    <th class="p-3 text-center">Trạng thái</th>
                    <th class="p-3 text-center">Ngày đặt</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr class="border-b text-center">
                        <td class="p-3 text-left">{{ $order->id }}</td>
                        <td class="p-3">{{ number_format($order->total) }}đ</td>
                        <td class="p-3">{{ $order->status }}</td>
                        <td class="p-3">{{ $order->created_at->format('d/m/Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-6 text-center text-gray-500">
                            Bạn chưa có đơn hàng nào
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</x-app-layout>
