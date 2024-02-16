@props(['name'])
<label class="block font-light text-sm text-gray-700"
       for="{{ $name }}">
    {{ ucwords($name) }}
</label>