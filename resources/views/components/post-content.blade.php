@props(['post'])

<article {{ $attributes(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }} >
    <div class="py-6 px-5">
        <div class="flex justify-center">
            <div class="flex-col lg:max-w-full max-w-xl">
                <div>
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration"
                         class="rounded-xl">
                </div>

                <div class="flex-1">
                    @include('posts._post-bookmark')
                    <div class="my-3">
                        <a href="/?category={{ $post->category->name }}"
                           class="transition-colors duration-300  font-bold px-3 py-1 border-2 border-purple-500 rounded-full text-purple-500 uppercase hover:text-white hover:bg-purple-500"
                           style="font-size: 11px">{{ $post->category->name }}</a>
                    </div>

                    <header>
                        <div class="mt-4 h-24">
                            <h1 class="text-3xl">
                                <a href="/posts/{{ $post->handle }}"
                                   class="transition-all duration-300 hover:text-purple-500">
                                    {{ $post->title }}
                                </a>
                            </h1>

                            <span class="mt-2 block text-gray-400 text-xs">
                        Published <time> {{ $post->created_at->diffForHumans() }}</time> by
                        <a href="/?author=" {{ $post->author->username }}
                        class="text-black underline hover:text-purple-600">
                        {{ $post->author->name }} </a>
                    </span>
                        </div>
                    </header>

                    <div>
                        <div class="text-sm mt-4">
                            <p class="overflow-hidden h-24">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </div>

                    <form id="user-follow-form" method="GET"
                          action="/posts/{{ $post->handle }}">
                        <div class="flex mt-4">
                            <button class="transition-colors duration-300 text-xs font-semibold bg-gray-200 text-black hover:bg-purple-700 hover:text-white rounded-full py-2 w-32">
                                Read More
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
</article>
