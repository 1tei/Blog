@props(['posts'])

<x-post-featured :post="$posts->first()"/>

@if ($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6 mb-8">
        @foreach ($posts->skip(1) as $post)
            <x-post-content
                    :post="$post"
                    class="{{ 'col-span-2' }}"/>
        @endforeach
    </div>
@endif
