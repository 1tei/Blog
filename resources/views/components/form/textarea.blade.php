@props(['name'])
<div class="mb-6 text-sm">
    <x-form.label name="{{ $name }}"/>

    <textarea name="{{ $name }}"
              id="{{ $name }}"
              rows="4"
              class="w-full focus:outline-none focus:ring border border-gray-400"
              required
    >{{ old($name) }}</textarea>

    <x-form.error name="{{ $name }}"/>
</div>