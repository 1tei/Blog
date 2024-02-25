<x-layout>
    <x-setting heading="Dashboard">
        <section class="px-6 max-w-4xl mx-auto -m-16">
            <div class="grid grid-cols-6">
                <div class="transition-colors duration-300 col-span-2 my-6 mx-4 border border-purple-500 rounded-xl">
                    <div class="my-6 mx-4">
                        <h1 class="font-semibold text-md text-gray-900 mb-4"> Newest Users: </h1>
                        <div class="flex-col">
                            @foreach($users as $user)
                                <div>
                                    <div class="inline-flex items-center">
                                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="avatar"
                                             class="rounded-xl w-8 h-8">
                                        <h1 class="font-light text-gray-900 ml-2">{{ ucwords($user->name) }}</h1>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="transition-colors duration-300 col-span-2 my-6 mx-4 border border-purple-500 rounded-xl">
                    <div class="my-6 mx-4">
                        <h1 class="font-semibold text-md text-gray-900 mb-4"> Newest posts: </h1>
                        <div class="flex-col">
                            @foreach($posts as $post)
                                <div>
                                    <div class="inline-flex items-center">
                                        <a href="/posts/{{ $post->handle }}">
                                            <h1 class="font-light text-gray-900 mb-1 hover:text-purple-500"> {{ ucwords($post->title) }}</h1>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="transition-colors duration-300 col-span-4 my-6 mx-4 border border-purple-500 rounded-xl">
                    <div class="my-6 mx-4">
                        <h1 class="font-semibold text-md text-gray-900 mb-4"> Most viewed: </h1>
                        <div class="flex-col">
                            @foreach($posts as $post)
                                <div>
                                    <div class="inline-flex items-center">
                                        <a href="/posts/{{ $post->handle }}">
                                            <h1 class="font-light text-gray-900 mb-1 hover:text-purple-500">
                                                [{{ $post->view_count }}
                                                views] {{ ucwords($post->title) }}</h1>

                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </x-setting>
</x-layout>