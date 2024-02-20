@props(['comment'])

<div class="border border-gray-200 rounded-xl w-full px-4 py-8">
    <article class="flex space-x-8">
        <div class="flex-shrink-0">
            <img src="{{ asset('storage/' . $comment->author->avatar)}}" alt="avatar" width="60" height="60"
                 class="rounded-xl">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ ucwords($comment->author->name) }}</h3>

                <p class="font-xs">Posted
                    <time>{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</div>