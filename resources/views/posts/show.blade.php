<x-layout>
    <body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/background.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published
                        <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="flex items-center text-sm">
                        <img src="/images/author.svg" alt="avatar" width="70">
                        <div class="ml-3">
                            <a href="/?author={{ $post->author->username }}">
                                <h5 class="font-bold"> {{ $post->author->name }}</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
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

                        <div class="space-x-2">
                            <a href="/?category={{ $post->category->name }}"
                               class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                               style="font-size: 10px"> {{ $post->category->name }}</a>
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
                    <form method="POST" action="#" class="border border-gray-200 p-6 rounded-xl"
                    @csrf

                    <header class="flex items-center">
                        <img src="https://i.pravatar.cc/100?u={{ Auth::id() }}" alt="avatar" width="40" height="40"
                             class="rounded-xl">
                        <h2 class="ml-4">Want to participate?</h2>
                    </header>

                    <div class="mt-6 text-sm">
                        <textarea name="body" cols="20" rows="4" placeholder="Quick, think of something to say!"
                                  class="w-full focus:outline-none focus:ring"></textarea>
                    </div>

                    <div>
                        <button type="submit"
                                class="mt-4 text-blue-500 rounded-full text-sm px-8 py-1 border-2 border-blue-500 hover:bg-blue-500 hover:text-white">
                            Post
                        </button>
                    </div>
                    </form>

                    @foreach ($post->comments as $comment)
                        <x-post-comment :comment="$comment"/>
                    @endforeach
                </section>
            </article>
        </main>
    </section>
    </body>
</x-layout>
