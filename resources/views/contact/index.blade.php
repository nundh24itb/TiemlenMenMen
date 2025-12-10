<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-pink-700">
            Liên Hệ Với Chúng Tôi
        </h2>
    </x-slot>

    <div class="p-6 space-y-8">

        {{-- Thông tin liên hệ --}}
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-3 text-pink-700">Thông Tin Liên Hệ</h3>
            <p>📞 Số điện thoại: 0123 456 789</p>
            <p>✉️ Email: lienhe@cualen.com</p>
            <p>🏠 Địa chỉ: 123 Đường Len, Quận 1, TP.HCM</p>
            <p>⏰ Giờ làm việc: 8:00 - 18:00 (Thứ 2 - Chủ nhật)</p>
        </div>

        {{-- Form liên hệ --}}
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-3 text-pink-700">Gửi Tin Nhắn Cho Chúng Tôi</h3>

            @if(session('success'))
                <p class="mb-4 text-green-600">{{ session('success') }}</p>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block font-medium text-gray-700">Tên của bạn</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
                    @error('name')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="email" class="block font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
                    @error('email')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="phone" class="block font-medium text-gray-700">Số điện thoại</label>
                    <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
                    @error('phone')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="message" class="block font-medium text-gray-700">Nội dung</label>
                    <textarea name="message" id="message" rows="5" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>{{ old('message') }}</textarea>
                    @error('message')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="px-6 py-2 bg-pink-600 text-white rounded hover:bg-pink-700">Gửi</button>
            </form>
        </div>

        {{-- Mạng xã hội --}}
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-3 text-pink-700">Mạng Xã Hội</h3>
            <div class="flex space-x-4">
                <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Facebook</a>
                <a href="#" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Instagram</a>
                <a href="#" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">TikTok</a>
            </div>
        </div>

        {{-- Bản đồ --}}
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-3 text-pink-700">Bản Đồ Cửa Hàng</h3>
            <div class="w-full h-64">
                <iframe
                    class="w-full h-full rounded"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.123456789!2d106.123456!3d10.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529abcdef!2sCua%20Hang%20Len!5e0!3m2!1sen!2s!4v0000000000000"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>

    </div>
</x-app-layout>
