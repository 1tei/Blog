@auth
    <div class="border border-gray-200 rounded-xl w-full px-4 py-8">
        <form method="POST" action="/posts/{{ $post->handle }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="{{ asset('storage/' . $post->author->avatar) }}" alt="avatar" width="40"
                     height="40"
                     class="rounded-xl">
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6 text-sm">
                                    <textarea name="body" cols="20" rows="4"
                                              placeholder="Quick, think of something to say!"
                                              class="w-full focus:outline-none focus:ring"
                                              required></textarea>

                @error('body')
                <span class="text-red-600 font-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <x-form.button>
                    Post
                </x-form.button>
            </div>
        </form>
    </div>
@else
    <div class="border border-gray-200 rounded-xl w-full px-4 py-8">
        <a href="/register"
           class="text-blue-500 hover:underline">Register</a>
        or
        <a href="/login" class="text-blue-500 hover:underline">Login</a>
        to comment on this post.
    </div>
@endauth