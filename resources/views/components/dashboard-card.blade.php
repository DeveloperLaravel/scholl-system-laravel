{{-- resources/views/components/dashboard-card.blade.php --}}
@props([
    'title',
    'count' => null,
    'description' => '',
    'colorFrom' => 'gray-400',
    'colorVia' => 'gray-300',
    'colorTo' => 'gray-500',
])

<div class="bg-gradient-to-br from-{{ $colorFrom }} via-{{ $colorVia }} to-{{ $colorTo }} dark:from-gray-700 dark:to-gray-800 rounded-2xl shadow-2xl p-8 text-center hover:scale-105 transition-transform">
    <p class="text-white font-semibold text-lg">{{ $title }}</p>
    @if($count !== null)
        <p class="text-5xl font-bold mt-4 text-white">{{ $count }}</p>
    @endif
    @if($description)
        <p class="mt-2 text-white/80 text-sm">{{ $description }}</p>
    @endif
    {{ $slot }}
</div>
