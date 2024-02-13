<!doctype html>

<title>My Blog</title>
@vite('resources/css/app.css')
<script src="//unpkg.com/alpinejs" defer></script>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body>
<nav class="md:flex md:justify-between md:items-center px-8">
    <div>
        <a href="/">
            <img src="/images/logo.png" alt="Site Logo" width="100" height="32">
        </a>
    </div>

    <div class="flex items-center text-xs font-semibold">
        @auth
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}</button>
                </x-slot>

                @admin
                <x-dropdown-item href="#">Dashboard</x-dropdown-item>
                <x-dropdown-item href="/admin/posts" :active="request()->routeIs('postAll')">All Posts
                </x-dropdown-item>
                <x-dropdown-item href="/admin/posts/create" :active="request()->routeIs('postCreate')">New Post
                </x-dropdown-item>
                <x-dropdown-item href="/admin/posts/create">Category</x-dropdown-item>
                @endadmin

                <x-dropdown-item href="#" x-data="()" @click.prevent="document.querySelector('#logout-form').submit()">
                    Logout
                </x-dropdown-item>

                <form id="logout-form" method="POST" action="/logout"
                      class="text-xs font-semibold ml-6 hidden">
                    @csrf
                    <button type="submit"
                            class="text-blue-500 rounded-full py-3 px-5 border-2 border-blue-500 hover:bg-blue-500 hover:text-white">
                        LOG OUT
                    </button>
                </form>
            </x-dropdown>
        @else
            <a href="/register"
               class="text-blue-500 rounded-full py-3 px-5 border-2 border-blue-500 hover:bg-blue-500 hover:text-white">REGISTER</a>
            <a href="/login"
               class="text-blue-500 ml-4 rounded-full py-3 px-5 border-2 border-blue-500 hover:bg-blue-500 hover:text-white">LOGIN</a>
        @endauth

        <a href="#newsletter"
           class="bg-blue-500 rounded-full ml-4 text-xs font-semibold text-white uppercase py-3 px-5 border-2 border-blue-500">
            Subscribe for Updates
        </a>
    </div>
</nav>

{{ $slot }}

<footer id="newsletter"
        class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
    <h5 class="text-3xl">Stay in touch with the latest posts</h5>
    <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

    <div class="mt-10">
        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
            <form method="POST" action="/newsletter" class="lg:flex text-sm">
                @csrf

                <div class="lg:py-3 lg:px-5 flex items-center">
                    <label for="email" class="hidden lg:inline-block">
                        <x-mailbox-icon/>
                    </label>

                    <input id="email" name="email" type="text" placeholder="Your email address"
                           class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                </div>

                <button type="submit"
                        class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                >
                    Subscribe
                </button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        @error('email')
        <span class="text-red-600 font-xs">{{ $message }}</span>
        @enderror
    </div>
</footer>

<x-flash/>
</body>