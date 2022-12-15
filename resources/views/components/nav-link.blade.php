@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-gray-900 dark:text-gray-300'
            : 'text-gray-800 dark:text-gray-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
