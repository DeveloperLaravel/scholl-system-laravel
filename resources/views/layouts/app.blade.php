<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
 dir="rtl"
      class="transition-colors duration-500">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  
          <style>
        body {
            font-family: 'Figtree', sans-serif;
        }

        .hero-bg {
            background-image: url('{{ asset("images/1.avif") }}');
            background-size: cover;
            background-position: center;
        }
    </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="
    min-h-screen
    bg-gray-100 text-gray-900
    dark:bg-gray-900 dark:text-gray-100
    transition-colors duration-500 
">


        @include('layouts.navigation')
       <div {{ $attributes->merge(['class' => 'min-h-screen bg-gradient-to-br from-red-100 via-yellow-50 to-red-200 dark:from-gray-900 dark:to-gray-800 p-4 sm:p-6 md:p-8']) }}>
        {{ $slot }}
    </div>


<!-- ================= THEME SCRIPT ================= -->
<script>
    // استعادة الوضع من localStorage عند تحميل الصفحة
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    }

    function toggleTheme() {
        document.documentElement.classList.toggle('dark');
        // حفظ الوضع الحالي
        if (document.documentElement.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    }

    // ربط الأزرار
    document.getElementById('theme-toggle')?.addEventListener('click', toggleTheme);
    document.getElementById('theme-toggle-mobile')?.addEventListener('click', toggleTheme);

    // Mobile menu
    const menuBtn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
</body>
</html>
