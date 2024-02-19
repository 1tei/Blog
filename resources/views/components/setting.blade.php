@props(['heading'])
<section class="px-6 max-w-7xl mx-auto">
    <h1 class="text-xl font-bold mb-8 border-b pb-4">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/admin/dashboard"
                       class="{{ request()->is('admin/dashboard') ? 'text-purple-700 font-normal' : '' }}">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/posts"
                       class="{{ request()->is('admin/posts') ? 'text-purple-700 font-normal' : '' }}">All Posts</a>
                </li>
                <li>
                    <a href="/admin/users"
                       class="{{ request()->is('admin/users') ? 'text-purple-700 font-normal' : '' }}">All users</a>
                </li>
                <li>
                    <a href="/admin/categories"
                       class="{{ request()->is('admin/categories') ? 'text-purple-700 font-normal' : '' }}">All
                        categories</a>
                </li>
                <li>
                    <a href="/admin/posts/create"
                       class="{{ request()->is('admin/posts/create') ? 'text-purple-700 font-normal' : '' }}">New
                        Post</a>
                </li>
                <li>
                    <a href="/admin/categories/create"
                       class="{{ request()->is('admin/categories/create') ? 'text-purple-700 font-normal' : '' }}">New
                        category</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>