@props([
    'label' => null,
    'model',
    'classe' => '',
    'type' => 'text'
])
<div {{ $attributes->merge(['class' => 'my-2']) }}>
    @if ($label)
        <label for="{{ $model }}" class="block mb-1.5 font-semibold">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" name="{{ $model }}" id="{{ $model }}" wire:model.live="{{ $model }}" class="rounded-lg w-full {{ $classe }} focus:ring-2" />
    @error($model)
        <span class="block text-sm text-red-600 font-semibold mt-0.5">*{{ $message }}</span>
    @enderror
</div>