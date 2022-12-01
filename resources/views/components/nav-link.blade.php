@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center  px-1 pt-1 border-b-2 border-red-400 text-sm font-medium leading-5 text-black focus:outline-none focus:border-red-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-black hover:text-gray-700 hover:border-red-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<style>
    #menu{
        width: 100%;
    }
</style>

<a id="menu"  {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
