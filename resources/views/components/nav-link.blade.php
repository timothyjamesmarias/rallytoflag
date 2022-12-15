@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-gray-700 dark:text-gray-300'
            : 'text-gray-700 dark:text-gray-300 hover:text-violet-500 dark:hover:text-violet-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
