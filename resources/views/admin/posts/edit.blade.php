<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.simpleInput name="title" :value="old('title', $post->title)"/>
            <x-form.simpleInput name="handle" :value="old('handle', $post->handle)"/>
            <x-form.simpleInput name="author" :value="old('author', $post->author->username)"/>
            <div class="flex">
                <div class="flex-1">
                    <x-form.simpleInput name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"/>
                </div>
                <div class="ml-6">
                    <x-form.label name="Current image"/>
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" width="200" alt="Blog Post illustration"
                         class="rounded-xl">
                </div>
            </div>
            <div>
                <x-form.label name="category_id"/>

                <select name="category_id" id="category_id" class="mb-6">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category_id"/>
            </div>
            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body" rows="12">{{ old('body', $post->body) }}</x-form.textarea>

            <div class="flex justify-center">
                <x-form.button>
                    Update
                </x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>