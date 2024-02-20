<div class="relative">
    <div class="absolute top-0 right-0 inline-flex text-gray-900 items-center h-6 border-purple-700 border-2 rounded-full px-2 py-1 hover:bg-gray-200 transition-colors duration-300">
        <h1 class="mr-1 font-normal text-md mt-0.5"> {{ $post->bookmarks->count() }}</h1>

        @auth
            @if ((auth()->user()->bookmarkInstances())->contains($post))
                <form id="user-unfavorite-form" method="POST"
                      action="/unfavorite/{{ $post->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="flex items-center">
                        <x-icon.starFilled/>
                    </button>
                </form>
            @else
                <form id="user-favorite-form" method="POST"
                      action="/favorite/{{ $post->id }}">
                    @csrf
                    <button class="flex items-center">
                        <x-icon.star/>
                    </button>
                </form>
            @endif
        @endauth
    </div>
</div>