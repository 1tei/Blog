@props(['active' => false])
@php
    $classes = 'block text-left px-3 text-sm leading-6 hover:bg-purple-700 hover:text-white focus:bg-purple-600';

    if ($active) $classes .= ' text-white bg-purple-400';
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>