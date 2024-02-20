<x-layout>
    <x-setting heading="Publish a new post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.simpleInput name="title"/>
            <x-form.simpleInput name="handle"/>
            <x-form.simpleInput name="thumbnail" type="file"/>


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

            <x-form.textarea name="excerpt"/>
            <x-form.textarea name="body"/>

            <div class="flex justify-center">
                <x-form.button>
                    Publish
                </x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>