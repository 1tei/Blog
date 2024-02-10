@props(['comment'])

<article class="flex bg-gray-100 p-6 rounded-xl border border-gray-200 space-x-8">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/100?u={{ $comment->id }}" alt="avatar" width="60" height="60"
             class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->author->name }}</h3>

            <p class="font-xs">Posted
                <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>