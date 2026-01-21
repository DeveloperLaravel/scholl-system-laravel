<x-app-layout>
<div class="max-w-7xl mx-auto p-4">

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            ⛽ تقرير تعبئة الوقود
        </h2>

        <a href="{{ route('fuel.report.pdf') }}"
           class="px-5 py-2 rounded-xl text-white font-bold
                  bg-gradient-to-r from-red-500 to-orange-500
                  hover:scale-105 transition">
            📄 تحميل PDF
        </a>
    </div>

    <div class="overflow-x-auto rounded-2xl shadow">
        <table class="w-full text-sm text-center
                      bg-white dark:bg-gray-900
                      text-gray-700 dark:text-gray-200">
            <thead class="bg-gray-100 dark:bg-gray-800">
                <tr>
                    <th class="p-3">#</th>
                    <th>كود السيارة</th>
                    <th>تاريخ التعبئة</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fuels as $fuel)
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td>{{ $fuel->vehicle->qr_code }}</td>
                    <td>{{ $fuel->filled_at->format('Y-m-d H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-6 text-gray-400">
                        لا توجد بيانات
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $fuels->links() }}
    </div>

</div>
</x-app-layout>
