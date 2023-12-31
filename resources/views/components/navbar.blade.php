<nav
    class="flex items-center justify-between px-5 h-[4.5rem] border-b fixed top-0 w-full bg-gray-800/50 backdrop-blur-sm">
    <a href="/"
        class="text-3xl hover:text-white/75 focus-visible:text-white/75 transition-colors p-1 -m-1 rounded">LaraX</a>

    <ul class="flex items-center gap-2">
        @auth
            <li>
                <a class="button" href="/listing/add" class="text-sm">Add a listing</a>
            </li>
            <li>
                <a class="px-2 py-1 rounded" href="/logout" class="text-sm">logout</a>
            </li>
        @endauth
        @guest
            <li>
                <a class="px-2 py-1 rounded" href="/login" class="text-sm">Login</a>
                <a class="px-2 py-1 rounded" href="/register" class="text-sm">Register</a>
            </li>
        @endguest
    </ul>
</nav>
