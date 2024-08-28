@props([

])
<div {{ $attributes->merge(['class' => 'flex justify-center']) }}>

    <div class="w-full block mx-2 md:w-[80%] md:mx-0">
        {{ $slot }}
    </div>

</div>