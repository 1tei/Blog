<div class="inline-flex items-center text-sm">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/100?u={{ $post->user_id }}" alt="avatar"
             class="rounded-xl w-16 h-16">
    </div>
    <div class="ml-4 text-md text-center">
        <a href="/?author={{ $post->author->username }}">
            <div class="">
                <h1 class="font-bold"> {{ ucwords($post->author->name) }}</h1>
                <h2 class="text-xs -mt-1">{{ $post->author->followerInstances()->count() }} followers</h2>
            </div>
            <div class="mt-2">
                @auth
                    @if ((auth()->user()->followInstances())->contains($post->author->id))
                        <form id="user-unfollow-form" method="POST"
                              action="/unfollow/{{ $post->author->id }}">
                            @csrf
                            @method('DELETE')
                            <button
                                    class="transition-color duration-300 text-xs font-semibold bg-purple-500 text-white hover:bg-red-600 rounded-xl px-3 py-1">
                                Unfollow
                            </button>
                        </form>
                    @else
                        <form id="user-follow-form" method="POST"
                              action="/follow/{{ $post->author->id }}">
                            @csrf
                            <button
                                    class="transition-color duration-300 text-xs font-semibold bg-purple-500 text-white hover:bg-green-500 rounded-xl px-3 py-1">
                                Follow
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
            <div class="flex items-center mt-2">
            </div>
        </a>
    </div>
</div>