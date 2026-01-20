<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
     dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="antialiased bg-gradient-to-br from-red-100 via-yellow-50 to-red-200 dark:from-gray-900 dark:to-gray-800 transition-colors">

    <div class="min-h-screen flex items-center justify-center px-4">
        {{ $slot }}
            </div>
        </div>
    </body>
</html>
