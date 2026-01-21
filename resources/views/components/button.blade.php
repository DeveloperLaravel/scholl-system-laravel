@props(['type' => 'button', 'color' => 'green', 'onclick' => ''])

@php
$colors = [
    'green' => 'bg-gradient-to-r from-green-500 to-lime-400 hover:from-lime-400 hover:to-green-500 text-white',
    'red' => 'bg-gradient-to-r from-red-500 to-pink-400 hover:from-pink-400 hover:to-red-500 text-white',
];
@endphp

<button type="{{ $type }}" onclick="{{ $onclick }}" {{ $attributes->merge(['class' => $colors[$color] . ' px-4 py-2 rounded-lg shadow-lg hover:scale-105 transition-all text-center']) }}>
    {{ $slot }}
</button>
