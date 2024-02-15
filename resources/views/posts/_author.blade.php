<div class="flex flex-col text-sm">
    <div class="inner-flex flex justify-center items-center">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100?u={{ $post->user_id }}" alt="avatar"
                 class="rounded-xl w-16 h-16">
        </div>
        <div class="ml-4 text-left text-md">
            <a href="/?author={{ $post->author->username }}">
                <h1 class="font-bold"> {{ ucwords($post->author->name) }}</h1>
                <h2 class="-mt-1">{{ $post->author->description }}</h2>
                <div class="flex items-center mt-2">
                    <div>
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
                    <div class="text-left">
                        <h1 class="ml-2">{{ $post->author->followerInstances()->count() }} followers</h1>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>