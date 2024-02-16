<x-layout>
    @include ('posts._header')

    <div class="max-w-6xl mx-auto mt-6 space-y-6">
        <main>
            @if ($posts->count())
                <div class="lg:grid lg:grid-cols-6 mb-8">
                    @foreach ($posts->where('status', 'published') as $post)
                        @if ($post->bookmarks->isNotEmpty())
                            @foreach ($post->bookmarks as $bookmark)
                                @if ($bookmark->user->id === auth()->user()->id)
                                    <x-post-content
                                            :post="$post"
                                            class="{{ 'col-span-2' }}"/>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
            @else
                <h1 class="text-center">No posts yet, come back soon! Thanks.</h1>
            @endif
        </main>
    </div>
</x-layout>
