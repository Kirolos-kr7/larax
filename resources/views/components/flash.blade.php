@if (session()->has('message'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
        class="fixed top-3 left-1/2 -translate-x-1/2 p-3 z-50 bg-emerald-800 rounded border">
        <p>{{ session('message') }}</p>
    </div>
@endif
