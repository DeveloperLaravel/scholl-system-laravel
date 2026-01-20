<x-app-layout>
<div class="max-w-md mx-auto bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-bold mb-4">➕ إضافة محطة</h2>

    <form method="POST" action="{{ route('stations.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">اسم المحطة</label>
            <input name="name" class="w-full border rounded p-2" value="{{ old('name') }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">الموقع</label>
            <input name="location" class="w-full border rounded p-2" value="{{ old('location') }}">
        </div>

        <hr class="my-4">

        <h3 class="font-bold mb-2">حساب تسجيل دخول المحطة</h3>

        <div class="mb-4">
            <label class="block mb-1">البريد الإلكتروني</label>
            <input name="email" type="email" class="w-full border rounded p-2" value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">كلمة المرور</label>
            <input name="password" type="password" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">تأكيد كلمة المرور</label>
            <input name="password_confirmation" type="password" class="w-full border rounded p-2">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">حفظ المحطة وإنشاء المستخدم</button>
    </form>
</div>
</x-app-layout>
