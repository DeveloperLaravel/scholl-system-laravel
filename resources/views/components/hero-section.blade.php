<section class="
    relative
    min-h-screen
    flex items-center justify-center
    transition-colors duration-500
    {{ $bgClass ?? 'bg-gray-200 dark:bg-gray-800' }}
">

    <!-- Overlay -->
    <div class="absolute inset-0 {{ $overlayClass ?? 'bg-black/40 dark:bg-black/60' }} transition-colors duration-500"></div>

    <!-- Content -->
    <div class="relative z-10 text-center px-6 max-w-3xl">
        @if(isset($title))
            <h1 class="
                text-4xl sm:text-5xl font-extrabold mb-6 text-white drop-shadow-lg
                {{ $titleClass ?? '' }}
            ">
                {{ $title }}
            </h1>
        @endif

        @if(isset($subtitle))
            <p class="
                text-lg sm:text-xl leading-relaxed mb-8 text-gray-200 drop-shadow
                {{ $subtitleClass ?? '' }}
            ">
                {{ $subtitle }}
            </p>
        @endif

        @if(isset($buttons) && is_array($buttons))
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @foreach($buttons as $button)
                    <a href="{{ $button['url'] ?? '#' }}"
                       class="
                           px-6 py-3 rounded-lg font-semibold shadow transition
                           {{ $button['class'] ?? 'bg-gray-600 hover:bg-gray-700 text-white' }}
                       ">
                        {{ $button['text'] ?? 'زر' }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
