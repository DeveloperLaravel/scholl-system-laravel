<x-app-layout>
    <div class="min-h-screen flex items-center justify-center
                bg-gradient-to-br from-red-100 via-yellow-50 to-red-200
                dark:from-gray-900 dark:to-gray-800
                p-4 sm:p-6 md:p-8 transition-colors duration-500">

        <x-station-form
            action="{{ route('stations.store') }}"
            title="➕ إضافة محطة"
            button-text="حفظ المحطة وإنشاء المستخدم"
            :fields="[
                ['name' => 'name', 'label' => 'اسم المحطة', 'placeholder' => 'أدخل اسم المحطة', 'required' => true],
                ['name' => 'location', 'label' => 'الموقع', 'placeholder' => 'أدخل الموقع'],
                ['name' => 'email', 'type' => 'email', 'label' => 'البريد الإلكتروني', 'placeholder' => 'أدخل البريد الإلكتروني', 'required' => true],
                ['name' => 'password', 'type' => 'password', 'label' => 'كلمة المرور', 'placeholder' => 'أدخل كلمة المرور', 'required' => true],
                ['name' => 'password_confirmation', 'type' => 'password', 'label' => 'تأكيد كلمة المرور', 'placeholder' => 'أعد إدخال كلمة المرور', 'required' => true]
            ]"
        />
    </div>
</x-app-layout>
