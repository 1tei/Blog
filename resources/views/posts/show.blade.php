<x-layout>
    <body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto w-full lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:pt-14 mb-10">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration"
                         class="rounded-xl">

                    <p class="mt-4 block font-light text-xs text-gray-400">
                        Published
                        <time class="font-light text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</time>
                    </p>

                    <h1 class="font-light text-xs text-gray-400"> {{ $post->view_count }} views</h1>

                    <div class="text-sm items-center justify-start mt-8">
                        @include('posts._author')
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-purple-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            Back to Posts
                        </a>

                        <div>
                            <a href="/?category={{ $post->category->name }}"
                               class="transition-colors duration-300  font-bold px-3 py-1 border-2 border-purple-500 rounded-full text-purple-500 uppercase hover:text-white hover:bg-purple-500"
                               style="font-size: 11px">{{ $post->category->name }}</a>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {{ $post->body }}
                    </div>
                </div>

                <section class="col-span-8 col-start-5 mt-8 space-y-6">
                    @include('posts._add-comments-form')

                    @foreach ($post->comments as $comment)
                        <x-post-comment :comment="$comment"/>
                    @endforeach
                </section>
            </article>
        </main>
    </section>
    </body>
</x-layout>
