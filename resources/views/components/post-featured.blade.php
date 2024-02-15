@props(['post'])

<article {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }} >
    <div class="py-6 px-5 flex justify-center">
        <div class="lg:flex lg:max-w-full max-w-xl">
            <div class="max-w-lg flex-shrink-0 lg:mr-8">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration"
                     class="rounded-xl">
            </div>

            <div class="flex flex-col">
                <header class="mt-4 lg:mt-0">
                    @include('posts._post-bookmark')

                    <div class="">
                        <a href="/?category={{ $post->category->name }}"
                           class="transition-colors duration-300  font-bold px-3 py-1 border-2 border-purple-500 rounded-full text-purple-500 uppercase hover:text-white hover:bg-purple-500"
                           style="font-size: 11px">{{ $post->category->name }}</a>
                    </div>

                    <div class="mt-4">
                        <h1 class="text-3xl font-normal">
                            <a href="/posts/{{ $post->handle }}"
                               class="transition-all duration-300 hover:text-purple-500">
                                {{ $post->title }}
                            </a>
                        </h1>

                        <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                    </div>
                </header>

                <div class="flex-1 text-sm mt-2">
                    <p>
                        {{ $post->excerpt }}
                    </p>
                </div>

                @include ('posts._post-footer')

            </div>
        </div>
    </div>
</article>
