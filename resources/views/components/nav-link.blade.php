@props([
    'active',
    'link'
])
@php
    $classe = '';
    $active ? $classe = 'block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 my-2 md:my-0' : $classe = 'block py-2 px-3 text-stone-900 rounded hover:bg-blue-700 hover:text-white md:hover:bg-transparent md:hover:text-blue-700 md:p-0 my-2 md:my-0';
@endphp
<li>
    <a wire:navigate href="{{ $link }}" class="{{ $classe }}">
        {{ $slot }}
    </a>
    
</li>