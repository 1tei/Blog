<x-layout>
    <x-setting :heading="'Edit Category: ' . $category->name">
        <form method="POST" action="/admin/categories/{{ $category->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.simpleInput name="name" :value="old('name', $category->name)"/>

            <div class="flex justify-center">
                <x-form.button>
                    Update
                </x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>