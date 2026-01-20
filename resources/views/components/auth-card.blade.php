@props(['title', 'subtitle', 'action', 'buttonText'])

<div class="w-full max-w-md bg-white/90 dark:bg-gray-900/90 backdrop-blur rounded-2xl shadow-2xl p-8">

    <!-- Logo -->
    <div class="flex flex-col items-center mb-6">

        <img src="{{ asset('images/2.jpg') }}" class="w-20 h-20 rounded-full shadow-lg mb-3" alt="محطة جالو">
        <h1 class="text-2xl font-extrabold text-gray-800 dark:text-white">{{ $title }}</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $subtitle }}</p>
    </div>

    <!-- Errors -->
    @if ($errors->any())
        <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Form Slot -->
    <form method="POST" action="{{ $action }}" class="space-y-4">
        @csrf
        {{ $slot }}

        <button type="submit"
            class="w-full py-3 rounded-xl bg-red-500 hover:bg-red-600
                   text-white font-bold shadow-lg hover:scale-[1.02] transition-all">
            {{ $buttonText }}
        </button>
    </form>
</div>
