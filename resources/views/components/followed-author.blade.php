@props(['follow'])
<li class="flex-shrink-0 border-r border-l rounded-2xl border-gray-200 mr-3">
    <a href="/?author={{ $follow->username }}"
       class="flex-col items-center">

        <div class="flex-shrink-0 flex justify-center mt-3">
            <img src="{{ asset('storage/' . $follow->avatar) }}" alt="avatar"
                 class="rounded-full w-10 h-10">
        </div>

        <h1 class="font-light m-3">{{ $follow->name }}</h1>
    </a>
</li>