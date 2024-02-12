@props(['name'])
<div class="mb-6 text-sm">
    <x-form.label name="{{ $name }}"/>

    <input class="border border-gray-400 p-2 w-full"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($name) }}"
           required
            {{ $attributes }}>

    <x-form.error name="{{ $name }}"/>
</div>