<x-layout>
    <section class="px-6 py-8 max-w-4xl mx-auto">
        <x-panel x-data="{ show: false }" @click.away="show = false">
            <div class="relative">
                <div class="absolute top-0 right-0">
                    <a href="/profile/edit/{{ $user->id }}"
                       class="transition-colors duration-300 bg-purple-500 rounded-full text-xs font-medium text-white uppercase py-1 px-3 border-2 border-purple-500 hover:border-purple-700 hover:bg-purple-700">
                        Edit
                    </a>
                </div>
            </div>

            <div class="flex flex-row">
                <div class="mr-8 flex-shrink-0">
                    <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-xl w-32 h-32 z-0">

                    <button @click="show = !show"
                            class="transition-all duration-300 text-transparent hover:text-white hover:bg-opacity-60 text-center hover:bg-gray-600 rounded-b-xl -mt-9 z-40 absolute w-32">
                        <h1 class="opacity-100 font-normal text-sm my-2">Change image</h1>
                    </button>

                    <div class="w-32 -mt-8 absolute" x-show="show" style="display:none">
                        <form method="POST" action="/profile" class="mt-14" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="flex">
                                <div class="flex-1 justify-start align-middle text-sm mb-4">
                                    <div class="w-full">
                                        <div>
                                            <input class="p-1 mt-2 border border-gray-200 w-full"
                                                   name="avatar"
                                                   id="avatar"
                                                   type="file"
                                                   required>
                                        </div>
                                        <x-form.error name="avatar"/>
                                    </div>
                                </div>
                            </div>

                            <button class="transition-colors duration-300 bg-purple-500 rounded-full text-xs
                                        font-medium text-white uppercase py-1 px-3 border-2 border-purple-500
                                        hover:border-purple-700 hover:bg-purple-700">
                                Upload photo
                            </button>
                        </form>
                    </div>
                </div>

                <div>
                    <h1 class="text-2xl font-light">{{ ucwords($user->name) }}</h1>
                    @if (!$user->description)
                        <h1 class="text-md font-extralight mt-1">No description</h1>
                    @else
                        <h1 class="text-lg font-light">{{ ucwords($user->description) }}</h1>
                    @endif
                </div>
            </div>

            <div class="ml-40 mt-8">
                <h1 class="text-purple-500 font-normal text-lg">About</h1>
                <hr>
                <div class="mt-4 flex-col flex space-y-4">
                    <div class="inline-flex items-center">
                        <h1 class="text-md font-normal w-32">Name:</h1>
                        <h1 class="ml-8">{{ $user->username }}</h1>
                    </div>

                    <div class="inline-flex items-center">
                        <h1 class="text-md font-normal w-32">Username:</h1>
                        <h1 class="ml-8">{{ $user->username }}</h1>
                    </div>

                    <div class="inline-flex items-center">
                        <h1 class="text-md font-normal w-32">Email:</h1>
                        <h1 class="ml-8">{{ $user->email }}</h1>
                    </div>

                    <div class="inline-flex items-center">
                        <h1 class="text-md font-normal w-32">Member since:</h1>
                        <h1 class="ml-8">{{ ($user->created_at)->format('d M, Y') }}</h1>
                    </div>
                </div>
            </div>
        </x-panel>
    </section>
</x-layout>