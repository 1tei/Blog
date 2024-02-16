<x-layout>
    @include ('posts._header')

    <div class="max-w-6xl mx-auto mt-6 space-y-6">
        <main>
            @if ($posts->where('status', 'published')->count())
                <x-posts-grid :posts="$posts"/>

                {{ $posts->links() }}
            @else
                <h1 class="text-center">No posts yet, come back soon! Thanks.</h1>
            @endif
        </main>
    </div>
</x-layout>
