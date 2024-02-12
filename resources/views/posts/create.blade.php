<x-layout>
    <section class="px-6 max-w-lg mx-auto">
        <h1 class="text-xl text-center font-bold mb-8">
            Publish A New Post
        </h1>
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-panel class="max-w-lg mx-auto">
                <x-form.input name="title"/>
                <x-form.input name="handle"/>
                <x-form.input name="thumbnail" type="file"/>

                <div>
                    <x-form.label name="category_id"/>

                    <select name="category_id" id="category_id" class="mb-6">
                        @foreach ($categories as $category)
                            <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    <x-form.error name="category_id"/>
                </div>

                <x-form.textarea name="Excerpt"/>
                <x-form.textarea name="Body"/>

                <div class="flex justify-center">
                    <x-form.button>
                        Publish
                    </x-form.button>
                </div>
            </x-panel>

        </form>
    </section>
</x-layout>