<div
    class="
        min-h-screen flex items-center justify-center
        bg-gradient-to-br
        from-red-100 via-yellow-50 to-red-200
        dark:from-gray-900 dark:to-gray-800
        p-4 transition-colors duration-500
    "
>
    <div
        class="
            w-full max-w-md
            bg-white dark:bg-gray-900
            p-6 sm:p-8
            rounded-3xl
            shadow-2xl
            border border-gray-200 dark:border-gray-700
            transition-all duration-500
        "
    >
        {{ $slot }}
    </div>
</div>
