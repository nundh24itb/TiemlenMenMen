<x-app-layout>
    <h1 class="text-3xl font-bold mb-6">Tài khoản của tôi</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Khung thông tin -->
        <div class="bg-white p-5 rounded shadow">
            <h2 class="text-xl font-semibold mb-3">Thông tin cá nhân</h2>
            <p><strong>Tên:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <!-- Khung điều hướng -->
        <div class="bg-white p-5 rounded shadow">
            <h2 class="text-xl font-semibold mb-3">Quản lý tài khoản</h2>

            <ul class="space-y-2">
                <li>
                    <a href="{{ route('orders.index') }}"
                       class="block p-2 bg-pink-100 hover:bg-pink-200 rounded">
                       📦 Đơn hàng của tôi ({{ $orderCount }})
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="block p-2 bg-gray-100 hover:bg-gray-200 rounded">
                       🔒 Đổi mật khẩu (chưa làm)
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="block p-2 bg-gray-100 hover:bg-gray-200 rounded">
                       ⚙️ Cài đặt tài khoản (chưa làm)
                    </a>
                </li>
            </ul>
        </div>

    </div>
</x-app-layout>
