<x-layout>
    <section class="px-6 py-8 max-w-2xl mx-auto">
        <x-panel>
            <h1 class="font-normal text-2xl">Welcome back! :)</h1>
            <h2 class="mt-2"> To keep connected with us please login with your personal information by username and
                password</h2>
            <form method="POST" action="/login" class="mt-14">
                @csrf
                <x-form.input name="email" autocomplete="email">
                    <x-slot name="icon">
                        <x-icon.circle>
                            <x-icon.email/>
                        </x-icon.circle>
                    </x-slot>
                </x-form.input>

                <x-form.input name="password" type="password" autocomplete="new-password">
                    <x-slot name="icon">
                        <x-icon.circle>
                            <x-icon.password/>
                        </x-icon.circle>
                    </x-slot>
                </x-form.input>

                <div class="flex flex-row mt-2 justify-end mr-8">
                    <a href="/register"
                       class="bottom-0 text-gray-800 rounded-full text-xs font-extralight">
                        Forgot password?
                    </a>
                </div>

                <div class="flex flex-row mt-12">
                    <x-form.button>
                        Login now
                    </x-form.button>

                    <a href="/register"
                       class="transition-colors duration-300 ml-4 mt-2 text-gray-800 rounded-full text-sm font-normal px-4 py-2 border border-gray-800 hover:bg-gray-800 hover:text-white">
                        Create account
                    </a>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>