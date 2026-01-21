<x-app-layout>
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 p-4 pt-24">

    <div class="max-w-5xl mx-auto">

        {{-- العنوان --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                ⛽ تقرير تعبئة الوقود
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                السيارة: {{ $vehicle->name ?? 'غير محدد' }} — {{ $vehicle->qr_code }}
            </p>
        </div>

        {{-- الجدول --}}
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow overflow-x-auto">
            <table class="w-full text-sm text-center">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="p-3">#</th>
                        <th>تاريخ التعبئة</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fuelings as $fuel)
                        <tr class="border-b dark:border-gray-600">
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td>{{ $fuel->filled_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="p-6 text-gray-400">
                                لا توجد تعبئات
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- رجوع --}}
        <div class="mt-6">
            <a href="{{ url()->previous() }}"
               class="px-4 py-2 rounded-xl bg-gray-600 text-white">
               ⬅ رجوع
            </a>
        </div>

    </div>
</div>
</x-app-layout>
