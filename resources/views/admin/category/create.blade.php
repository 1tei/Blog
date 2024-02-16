<x-layout>
    <x-setting heading="Publish a new post">
        <form method="POST" action="/admin/categories" enctype="multipart/form-data">
            @csrf
            <x-form.simpleInput name="name"/>

            <div class="flex justify-center">
                <x-form.button>
                    Create
                </x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>