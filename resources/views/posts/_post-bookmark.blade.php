<div class="relative">
    <div class="absolute top-0 right-0">
        @auth
            @if ((auth()->user()->bookmarkInstances())->contains($post->id))
                <form id="user-unfavorite-form" method="POST"
                      action="/unfavorite/{{ $post->id }}">
                    @csrf
                    @method('DELETE')
                    <button>
                        <x-favorite-star-fill class="bg-purple-60"/>
                    </button>
                </form>
            @else
                <form id="user-favorite-form" method="POST"
                      action="/favorite/{{ $post->id }}">
                    @csrf
                    <button>
                        <x-favorite-star/>
                    </button>
                </form>
            @endif
        @endauth
    </div>
</div>