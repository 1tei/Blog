<x-layout>
    <section class="px-6 py-8 max-w-2xl mx-auto">
        <x-panel>
            <h1 class="font-normal text-2xl">Edit your profile</h1>
            <form method="POST" action="/admin/users/{{ $user->id }}" class="mt-14">
                @csrf
                @method('PATCH')

                <input type="hidden" value="{{ $user->id }}"
                       name="id"
                       id="id">

                <x-form.input name="name" :value="old('name', $user->name)">
                    <x-slot name="icon">
                        <x-icon.circle>
                            <x-icon.person/>
                        </x-icon.circle>
                    </x-slot>
                </x-form.input>
                <div class="flex flex-row justify-start align-middle text-sm px-8">
                    <div class="w-full ml-20 -mt-2 -mb-4">
                        <x-form.textarea :value="old('description', $user->description)"
                                         name="description">{{ old('description', $user->description) }}</x-form.textarea>
                        <x-form.error name="description"/>
                    </div>
                </div>
                <x-form.input name="username" :value="old('username', $user->username)">
                    <x-slot name="icon">
                        <x-icon.hashtag/>
                    </x-slot>
                </x-form.input>
                <x-form.input name="email" :value="old('email', $user->email)">
                    <x-slot name="icon">
                        <x-icon.circle>
                            <x-icon.email/>
                        </x-icon.circle>
                    </x-slot>
                </x-form.input>
                <div class="flex justify-center">
                    <x-form.button>
                        Update
                    </x-form.button>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>