@if (session()->has('success'))
    <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="fixed bg-green-500 text-white py-2 px-4 rounded-2xl bottom-8 right-8 text-sm">
        <p> {{ session('success') }}</p>
    </div>
@endif

@if (session()->has('fail'))
    <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="fixed bg-red-500 text-white py-2 px-4 rounded-2xl bottom-8 right-8 text-sm">
        <p> {{ session('fail') }}</p>
    </div>
@endif