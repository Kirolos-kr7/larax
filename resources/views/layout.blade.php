@vite('resources/css/app.css')

<html>

<head>
    <title>
        LaraX
        @hasSection('title')
            - @yield('title')
        @endif
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <x-flash />

    <x-navbar />

    <div class="container pt-20 px-5 min-w-full">
        @yield('content')
    </div>
</body>

</html>
