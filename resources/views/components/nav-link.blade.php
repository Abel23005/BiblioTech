@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block px-4 py-2 text-sm font-medium leading-5 text-white bg-gray-800 border-b-2 border-blue-500 focus:outline-none focus:bg-gray-800 transition duration-150 ease-in-out flex items-center'
            : 'block px-4 py-2 text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-800 border-b-2 border-transparent focus:outline-none focus:text-white focus:bg-gray-800 transition duration-150 ease-in-out flex items-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
