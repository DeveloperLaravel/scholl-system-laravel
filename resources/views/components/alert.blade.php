@props(['type' => 'success'])

@php
$colors = [
    'success' => 'bg-green-100 text-green-700',
    'error' => 'bg-red-100 text-red-700',
    'info' => 'bg-blue-100 text-blue-700'
];
@endphp

<div {{ $attributes->merge(['class' => "p-3 rounded mb-4 shadow " . ($colors[$type] ?? $colors['info'])]) }}>
    {{ $slot }}
</div>
