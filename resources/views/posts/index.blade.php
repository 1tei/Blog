<x-layout>
    @include ('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <!-- Latest Post (FEATURED) -->
        @if ($posts->count())
            <x-posts-grid :posts="$posts"/>

            {{ $posts->links() }}
        @else
            <h1 class="text-center">No posts yet, come back soon! Thanks.</h1>
        @endif
    </main>
    
    </section>
    </body>
</x-layout>
