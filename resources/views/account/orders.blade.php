<x-app-layout>
    <div class="max-w-6xl mx-auto py-10">
        <div class="grid grid-cols-4 gap-6">

            {{-- Sidebar --}}
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="font-semibold text-lg mb-4">Tài khoản</h2>

                <ul class="space-y-2">
                    <li><a href="{{ route('account') }}">Thông tin cá nhân</a></li>
                    <li><a class="text-blue-600" href="{{ route('account.orders') }}">Đơn hàng</a></li>
                </ul>
            </div>

            {{-- Main --}}
            <div class="col-span-3 bg-white shadow rounded-lg p-6">

                <h2 class="font-bold text-xl mb-6">Đơn hàng của tôi</h2>

                {{-- Tabs --}}
                <div class="flex space-x-6 mb-6">
                    @foreach(['pending' => 'Chờ xác nhận', 'shipping' => 'Đang giao', 'completed' => 'Đã giao', 'cancelled' => 'Đã hủy'] as $key => $label)
                        <a href="{{ route('account.orders',['status'=>$key]) }}"
                           class="{{ $status == $key ? 'text-blue-600 border-b-2 border-blue-600' : '' }} pb-1">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>

                {{-- List --}}
                @forelse($orders as $order)
                    <div class="border rounded p-4 mb-4">
                        <div class="flex justify-between">
                            <div>
                                <p><strong>Mã đơn:</strong> #{{ $order->id }}</p>
                                <p><strong>Tổng tiền:</strong> {{ number_format($order->total) }} đ</p>
                            </div>

                            <a href="{{ route('orders.show', $order->id) }}" class="text-blue-600">Xem chi tiết</a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Không có đơn nào.</p>
                @endforelse

                {{ $orders->links() }}

            </div>
        </div>
    </div>
</x-app-layout>
