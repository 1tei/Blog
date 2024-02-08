<x-layout>
        <article>
            <h1>
                {{ $post->title }}
            </h1>

            <p> By
                    <a href="/author/{{ $post->author->username }}">
                        {{ $post->author->name }}
                    </a>
                In
                    <a href="/category/{{ $post->category->name }}">
                        {{ Str::ucfirst($post->category->name) }}
                    </a>
            </p>

            <div>
                <p>
                    {{ $post->body }}
                </p>
            </div>
        </article>

    <a href="/">Go Back</a>
</x-layout>
