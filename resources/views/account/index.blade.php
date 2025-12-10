<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tài khoản của tôi
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto space-y-6">

            {{-- Thông tin --}}
            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-bold mb-4">Thông tin cá nhân</h3>

                <form action="{{ route('account.updateInfo') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label>Họ tên</label>
                        <input type="text" name="name" class="border p-2 w-full"
                               value="{{ $user->name }}">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="border p-2 w-full"
                               value="{{ $user->email }}">
                    </div>

                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Cập nhật
                    </button>
                </form>
            </div>

            {{-- Mật khẩu --}}
            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-bold mb-4">Đổi mật khẩu</h3>

                <form action="{{ route('account.updatePassword') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label>Mật khẩu hiện tại</label>
                        <input type="password" name="current_password" class="border p-2 w-full">
                    </div>

                    <div class="mb-3">
                        <label>Mật khẩu mới</label>
                        <input type="password" name="new_password" class="border p-2 w-full">
                    </div>

                    <div class="mb-3">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" name="new_password_confirmation" class="border p-2 w-full">
                    </div>

                    <button class="bg-green-600 text-white px-4 py-2 rounded">
                        Đổi mật khẩu
                    </button>
                </form>
            </div>

            {{-- Đơn hàng --}}
            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-bold mb-4">Đơn hàng của bạn</h3>

                <a href="{{ route('account.orders') }}" class="text-blue-600 underline">
                    Xem danh sách đơn hàng →
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
