@props(['name', 'icon'])
<div {{ $attributes(['class' => 'flex flex-row justify-start align-middle text-sm mb-4']) }}>
    <div class="w-full">
        <div>
            <x-form.label name="{{ $name }}"/>

            <input class="p-1 mt-2 border border-gray-200 w-full"
                   name="{{ $name }}"
                   id="{{ $name }}"
                    {{ $attributes(['value' => old($name)]) }}>
        </div>
        <x-form.error name="{{ $name }}"/>
    </div>
</div>