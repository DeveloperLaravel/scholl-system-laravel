<x-app-layout>
<div class="min-h-screen bg-gradient-to-br from-red-100 via-yellow-50 to-red-200 dark:from-gray-900 dark:to-gray-800 p-4 sm:p-6 md:p-8">

    <div class="max-w-7xl mx-auto bg-white dark:bg-gray-900 rounded-2xl shadow-2xl p-4 sm:p-6 md:p-8">

        {{-- العنوان --}}
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-3">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-red-600 dark:text-yellow-400">
                🚗 إدارة السيارات
            </h2>
            {{-- <a href="{{ route('vehicles.create') }}" 
               class="bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-indigo-500 hover:to-blue-500 text-white px-4 py-2 rounded-lg shadow-lg transition-transform hover:scale-105">
               + إضافة سيارة
            </a> --}}
        </div>

        {{-- رسالة نجاح --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- أزرار العمليات --}}
        <div class="flex flex-wrap gap-3 mb-4">
            <button type="button" onclick="bulkPrint()" 
                    class="flex-1 sm:flex-auto bg-gradient-to-r from-green-500 to-lime-400 hover:from-lime-400 hover:to-green-500 text-white px-4 py-2 rounded-lg shadow-lg hover:scale-105 transition-all text-center">
                🖨️ طباعة المحدد
            </button>
            <button type="button" onclick="bulkDelete()" 
                    class="flex-1 sm:flex-auto bg-gradient-to-r from-red-500 to-pink-400 hover:from-pink-400 hover:to-red-500 text-white px-4 py-2 rounded-lg shadow-lg hover:scale-105 transition-all text-center">
                🗑️ حذف المحدد
            </button>
        </div>

        {{-- جدول السيارات --}}
        <div class="overflow-x-auto overflow-y-auto max-h-[70vh] rounded-lg border border-gray-200 dark:border-gray-700 shadow-lg">
            <table class="w-full text-sm text-right min-w-[600px] border-collapse">
                <thead class="bg-slate-100 dark:bg-gray-800 sticky top-0 z-10">
                    <tr>
                        <th class="p-3 text-center">
                            <input type="checkbox" id="select-all" class="accent-red-500">
                        </th>
                        <th class="p-3 text-center">اللوحة</th>
                        <th class="p-3 text-center">المالك</th>
                        <th class="p-3 text-center">المحطة</th>
                        <th class="p-3 text-center">QR</th>
                        <th class="p-3 text-center">طباعة</th>
                        <th class="p-3 text-center">حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicles->take(50) as $vehicle)
                        <tr class="border-b hover:bg-gradient-to-r hover:from-red-50 hover:to-yellow-50 dark:hover:from-gray-700 dark:hover:to-gray-800 transition-all">
                            <td class="p-3 text-center">
                                <input type="checkbox" class="vehicle-checkbox accent-red-500" value="{{ $vehicle->id }}">
                            </td>
                            <td class="p-3 text-center font-medium">{{ $vehicle->plate_number }}</td>
                            <td class="p-3 text-center">{{ $vehicle->owner_name }}</td>
                            <td class="p-3 text-center">{{ $vehicle->station->name ?? 'كل المحطات' }}</td>
                            <td class="p-3 text-center">
                                {!! QrCode::size(50)->generate($vehicle->qr_code) !!}
                            </td>
                            <td class="p-3 text-center">
                                <a href="{{ route('vehicles.print', $vehicle) }}" target="_blank"
                                   class="bg-gradient-to-r from-green-400 to-lime-300 text-white px-3 py-1 rounded-lg shadow hover:scale-105 transition-transform inline-block">
                                   🖨️
                                </a>
                            </td>
                            <td class="p-3 text-center">
                                <form method="POST" action="{{ route('vehicles.destroy', $vehicle) }}" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 font-semibold hover:underline">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    {{-- فورمات مخفية --}}
    <form id="print-form" method="POST" action="{{ route('vehicles.print.bulk') }}" target="_blank">@csrf</form>
    <form id="delete-form" method="POST" action="{{ route('vehicles.bulk.delete') }}">@csrf</form>

    {{-- JavaScript --}}
    <script>
        const selectAll = document.getElementById('select-all');
        selectAll.addEventListener('change', function () {
            document.querySelectorAll('.vehicle-checkbox').forEach(cb => cb.checked = this.checked);
        });

        function getSelectedIds() {
            return [...document.querySelectorAll('.vehicle-checkbox:checked')].map(cb => cb.value);
        }

        function bulkPrint() {
            const ids = getSelectedIds();
            if (ids.length === 0) { alert('اختر سيارة واحدة على الأقل'); return; }
            const form = document.getElementById('print-form');
            form.querySelectorAll('input[name="vehicles[]"]').forEach(e => e.remove());
            ids.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'vehicles[]';
                input.value = id;
                form.appendChild(input);
            });
            form.submit();
        }

        function bulkDelete() {
            const ids = getSelectedIds();
            if (ids.length === 0) { alert('اختر سيارة واحدة على الأقل'); return; }
            if (!confirm('سيتم حذف السيارات المحددة، هل أنت متأكد؟')) return;
            const form = document.getElementById('delete-form');
            form.querySelectorAll('input[name="vehicles[]"]').forEach(e => e.remove());
            ids.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'vehicles[]';
                input.value = id;
                form.appendChild(input);
            });
            form.submit();
        }
    </script>
</div>
</x-app-layout>
