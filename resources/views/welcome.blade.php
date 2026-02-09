<x-app-layout>
    <x-hero-section
        title="مرحبًا بك في نظام إدارة المستشفى"
        subtitle="وهو نظام إلكتروني تم تطويره باستخدام إطار العمل Laravel بهدف تنظيم العمليات الإدارية والطبية داخل المستشفى بطريقة سهلة وفعّالة"
        :buttons="[
            ['text' => 'دخول النظام', 'url' => route('login'), 'class' => 'bg-red-500 hover:bg-red-600 text-white'],
            ['text' => 'تسجيل جديد', 'url' => route('register'), 'class' => 'bg-yellow-400 hover:bg-yellow-500 text-gray-900']
        ]"
    />
</x-app-layout>
