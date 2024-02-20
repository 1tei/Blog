@props(['follow'])
<li class="flex-shrink-0 border-r border-l rounded-2xl border-gray-200 mr-3 w-28 hover:bg-gray-100 transition-colors duration-300">
    <a href="/?author={{ $follow->username }}"
       class="flex-col items-center">

        <div class="flex-shrink-0 flex justify-center mt-3">
            <img src="{{ asset('storage/' . $follow->avatar) }}" alt="avatar"
                 class="rounded-full w-10 h-10">
        </div>

        <h1 class="font-medium mt-3 overflow-y-clip h-4 text-purple-500"
            style="font-size: 12px">{{ ucwords($follow->name) }}</h1>
        <h1 class="font-medium text-sm m-3 mt-0 overflow-y-clip overflow-x-clip h-6 uppercase">{{ $follow->username }}</h1>
    </a>
</li>