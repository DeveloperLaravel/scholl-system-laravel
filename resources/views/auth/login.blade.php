<x-guest-layout>
    <x-auth-card title="تسجيل الدخول" subtitle="منظومة تعبئة الوقود الإلكترونية"
                 action="{{ route('login') }}" buttonText="تسجيل الدخول">

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                البريد الإلكتروني
            </label>
            <input type="email" name="email" required autofocus
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                كلمة المرور
            </label>
            <input type="password" name="password" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
        </div>

        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                <input type="checkbox" name="remember" class="rounded text-red-500 focus:ring-red-500">
                تذكرني
            </label>
        </div>

        @if (Route::has('register'))
            <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-4">
                ليس لديك حساب؟
                <a href="{{ route('register') }}" class="text-red-600 font-semibold hover:underline">
                    إنشاء حساب
                </a>
            </p>
        @endif
    </x-auth-card>
</x-guest-layout>
