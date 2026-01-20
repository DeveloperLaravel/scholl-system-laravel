<x-app-layout>
<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between mb-6">
        <h2 class="text-xl font-bold">🏭 المحطات</h2>
        <a href="{{ route('stations.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ إضافة محطة</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full text-sm">
        <thead class="bg-slate-100">
        <tr>
            <th class="p-3 text-right">الاسم</th>
            <th class="p-3 text-right">الموقع</th>
            <th class="p-3 text-center">الإجراءات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stations as $station)
            <tr class="border-b hover:bg-slate-50">
                <td class="p-3">{{ $station->name }}</td>
                <td class="p-3">{{ $station->location ?? '-' }}</td>
                <td class="p-3 text-center space-x-2">
                    <a href="{{ route('stations.edit', $station) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">تعديل</a>
                    <form method="POST" action="{{ route('stations.destroy', $station) }}" class="inline-block" onsubmit="return confirm('هل أنت متأكد؟')">
                        @csrf @method('DELETE')
                        <button class="bg-red-600 text-white px-3 py-1 rounded">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
