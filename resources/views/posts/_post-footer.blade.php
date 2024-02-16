<footer class="flex justify-between items-end mt-8">
    @include('posts._author')
    <div class="text-white">
        <div class="mt-2">
            <form id="user-follow-form" method="GET"
                  action="/posts/{{ $post->handle }}">
                @csrf
                <button
                        class="transition-colors duration-300 text-xs font-semibold border-purple-700 border-2 text-purple-700 hover:bg-purple-700 hover:text-white rounded-full py-2 w-32">
                    Read More
                </button>
            </form>
        </div>
    </div>
</footer>