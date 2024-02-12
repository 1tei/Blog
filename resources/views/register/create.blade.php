<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-lg mx-auto">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method="POST" action="/register" class="mt-14">
                @csrf
                <x-form.input name="name"/>
                <x-form.input name="username"/>
                <x-form.input name="email" type="email"/>
                <x-form.input name="password" type="password"/>
                <div class="mb-6">
                    <x-form.button>
                        Register
                    </x-form.button>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>