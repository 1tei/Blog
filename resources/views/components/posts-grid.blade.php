@props(['posts'])

<x-post-featured :post="$posts->firstWhere('status', 'published')"/>

@if ($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6 mb-8">
        @foreach ($posts->where('status', 'published')->skip(1) as $post)
            <x-post-content
                    :post="$post"
                    class="{{ 'col-span-2' }}"/>
        @endforeach
    </div>
@endif
