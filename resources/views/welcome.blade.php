<x-app-layout>
    <x-hero-section
        title="منظومة تعبئة الوقود الإلكترونية"
        subtitle="نظام حديث لتنظيم تسجيل السيارات، إدارة عمليات التزويد، وضمان العدالة والشفافية بمحطة الوقود تحت إشراف المجلس البلدي جالو."
        :buttons="[
            ['text' => 'دخول النظام', 'url' => route('login'), 'class' => 'bg-red-500 hover:bg-red-600 text-white'],
            ['text' => 'تسجيل جديد', 'url' => route('register'), 'class' => 'bg-yellow-400 hover:bg-yellow-500 text-gray-900']
        ]"
    />
</x-app-layout>
