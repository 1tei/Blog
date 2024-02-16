<x-layout>
    <section class="px-6 py-8">
        <x-panel>
            <h1 class="font-normal text-2xl">Welcome, we are glad to see you! :)</h1>
            <h2 class="mt-2"> To keep connected with us please create an account with your personal information</h2>
            <form method="POST" action="/register" class="mt-14">
                @csrf
                <x-form.input name="name">
                    <x-slot name="icon">
                        <x-icon.circle>
                            <x-icon.person/>
                        </x-icon.circle>
                    </x-slot>
                </x-form.input>
                <x-form.input name="username">
                    <x-slot name="icon">
                        <x-icon.hashtag/>
                    </x-slot>
                </x-form.input>
                <x-form.input name="email" type="email">
                    <x-slot name="icon">
                        <x-icon.circle>
                            <x-icon.email/>
                        </x-icon.circle>
                    </x-slot>
                </x-form.input>
                <x-form.input name="password" type="password">
                    <x-slot name="icon">
                        <x-icon.circle>
                            <x-icon.password/>
                        </x-icon.circle>
                    </x-slot>
                </x-form.input>
                <div class="flex flex-row mt-12">
                    <x-form.button>
                        Register
                    </x-form.button>

                    <a href="/login"
                       class="transition-colors duration-300 ml-4 mt-2 text-gray-800 rounded-full text-sm font-normal px-4 py-2 border border-gray-800 hover:bg-gray-800 hover:text-white">
                        Login
                    </a>
            </form>
        </x-panel>
    </section>
</x-layout>