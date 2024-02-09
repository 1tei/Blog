<!doctype html>

<title>My Blog</title>
@vite('resources/css/app.css')
<link rel="stylesheet" href="/app.css">
<script src="//unpkg.com/alpinejs" defer></script>

<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/logo.png" alt="Site Logo" width="100" height="32">
        </a>
    </div>

    <div class="mt-8 md:mt-0">
        <a href="/" class="text-xs font-bold uppercase">Home Page</a>

        <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>

<body>
{{ $slot }}
</body>
