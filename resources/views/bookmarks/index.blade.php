<x-layout>
    <x-header/>

    <div class="max-w-6xl mx-auto mt-6 space-y-6">
        <main>
            <div class="lg:grid lg:grid-cols-6 mb-8">
                @if ($posts)
                    @foreach ($posts as $post)
                        <x-post-content
                                :post="$post"
                                class="{{ 'col-span-2' }}"/>
                    @endforeach
                @else
                    <h1 class="text-center">You don't have any posts bookmarked. Bookmark posts to save them for
                        later.</h1>
                @endif
            </div>
        </main>
    </div>
</x-layout>
