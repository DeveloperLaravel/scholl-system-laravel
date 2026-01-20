@props(['title', 'icon' => null])

<div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-3">
    <h2 class="text-2xl sm:text-3xl font-extrabold text-red-600 dark:text-yellow-400">
        {{ $icon }} {{ $title }}
    </h2>

    {{ $slot }}
</div>
