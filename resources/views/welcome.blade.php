<x-app-layout>


<section class="
    hero-bg
    min-h-screen
    flex items-center justify-center
    relative
    bg-gray-200 dark:bg-gray-800
    transition-colors duration-500
">

    <!-- Overlay -->
    <div class="
        absolute inset-0
        bg-black/40
        dark:bg-black/60
        transition-colors duration-500
    "></div>

    <!-- Content -->
    <div class="relative z-10 text-center px-6 max-w-3xl">
        <h1 class="
            text-4xl sm:text-5xl
            font-extrabold
            mb-6
            text-white
            drop-shadow-lg
        ">
            منظومة تعبئة الوقود الإلكترونية
        </h1>

        <p class="
            text-lg sm:text-xl
            leading-relaxed
            mb-8
            text-gray-200
            drop-shadow
        ">
            نظام حديث لتنظيم تسجيل السيارات،
            إدارة عمليات التزويد،
            وضمان العدالة والشفافية بمحطة الوقود
            تحت إشراف المجلس البلدي جالو.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('login') }}"
               class="
                    px-6 py-3
                    rounded-lg
                    bg-red-500 hover:bg-red-600
                    text-white font-semibold
                    shadow transition
               ">
                دخول النظام
            </a>

            <a href="{{ route('register') }}"
               class="
                    px-6 py-3
                    rounded-lg
                    bg-yellow-400 hover:bg-yellow-500
                    text-gray-900 font-semibold
                    shadow transition
               ">
                تسجيل جديد
            </a>
        </div>
    </div>
</section>


</x-app-layout>
