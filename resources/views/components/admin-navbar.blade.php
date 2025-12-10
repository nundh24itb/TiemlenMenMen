<div class="flex items-center justify-between">
    <div>
        <h2 class="text-lg font-semibold">{{ $title ?? 'Admin Dashboard' }}</h2>
    </div>

    <div class="flex items-center gap-4">
        <div class="text-sm">
            Xin chào, {{ auth()->user()?->name ?? 'Guest' }}
        </div>
        <div>
            <a href="{{ url('/') }}" class="text-sm text-blue-600 hover:underline">Back to site</a>
        </div>
    </div>
</div>
