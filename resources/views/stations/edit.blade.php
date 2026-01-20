<x-app-layout>
<div class="max-w-md mx-auto bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-bold mb-4">✏️ تعديل محطة</h2>

    <form method="POST" action="{{ route('stations.update', $station) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">الاسم</label>
            <input name="name" class="w-full border rounded p-2" value="{{ old('name', $station->name) }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">الموقع</label>
            <input name="location" class="w-full border rounded p-2" value="{{ old('location', $station->location) }}">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">تحديث</button>
    </form>
</div>
</x-app-layout>
