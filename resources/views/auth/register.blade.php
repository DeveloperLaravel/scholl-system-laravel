<x-guest-layout>
    <x-auth-card title="إنشاء حساب جديد" subtitle="منظومة تعبئة الوقود الإلكترونية"
                 action="{{ route('register') }}" buttonText="إنشاء الحساب">

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">الاسم الكامل</label>
            <input type="text" name="name" required autofocus
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition"
                   value="{{ old('name') }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">البريد الإلكتروني</label>
            <input type="email" name="email" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition"
                   value="{{ old('email') }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">كلمة المرور</label>
            <input type="password" name="password" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
        </div>

        <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-4">
            لديك حساب بالفعل؟
            <a href="{{ route('login') }}" class="text-red-600 font-semibold hover:underline">
                تسجيل الدخول
            </a>
        </p>
    </x-auth-card>
</x-guest-layout>
