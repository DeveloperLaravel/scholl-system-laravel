<x-app-layout>
<div
    class="
        min-h-screen
        bg-gradient-to-br
        from-slate-100 via-white to-slate-200
        dark:from-gray-900 dark:via-gray-900 dark:to-gray-800

        px-3 sm:px-4 md:px-6 lg:px-8
        pt-20 sm:pt-24 md:pt-28 lg:pt-32
        pb-6

        transition-colors duration-500
    "
>
    <div class="max-w-7xl mx-auto">

        {{-- العنوان --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-gray-800 dark:text-gray-100">
                    ⛽ تقارير تعبئة الوقود
                </h1>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                    عرض آخر عمليات تعبئة الوقود لكل سيارة
                </p>
            </div>

            {{-- الأزرار --}}
            <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                {{-- <a href="{{ route('fuel.report',  $vehicle) }}"
                   class="w-full sm:w-auto text-center
                          px-4 py-2 rounded-xl text-white font-semibold
                          bg-gradient-to-r from-blue-500 to-indigo-600
                          hover:from-blue-600 hover:to-indigo-700
                          transition shadow">
                    📊 التقارير
                </a> --}}

                <a href="{{ route('fuel.pdf') }}"
                   class="w-full sm:w-auto text-center
                          px-4 py-2 rounded-xl text-white font-semibold
                          bg-gradient-to-r from-red-500 to-rose-600
                          hover:from-red-600 hover:to-rose-700
                          transition shadow">
                    📄 PDF
                </a>
            </div>
        </div>

        {{-- جدول (Desktop فقط) --}}
        <div class="hidden md:block bg-white dark:bg-gray-900 rounded-2xl shadow border border-gray-200 dark:border-gray-700 overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                    <tr>
                        <th class="p-4 text-right">السيارة</th>
                        <th class="p-4 text-center">QR</th>
                        <th class="p-4 text-center">آخر تعبئة</th>
                        <th class="p-4 text-center">الحالة</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($vehicles as $vehicle)
                    @php
                        $lastFill = $vehicle->fuelings->sortByDesc('filled_at')->first();
                        $canFill = !$lastFill || now()->diffInDays($lastFill->filled_at) >= 3;
                    @endphp

                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                        <td class="p-4 font-semibold text-gray-800 dark:text-gray-100">
                            {{ $vehicle->name ?? 'غير محدد' }}
                        </td>

                        <td class="p-4 text-center font-mono text-xs break-all">
                            {{ $vehicle->qr_code }}
                        </td>

                        <td class="p-4 text-center whitespace-nowrap">
                            {{ $lastFill?->filled_at?->format('Y-m-d H:i') ?? '—' }}
                        </td>

                        <td class="p-4 text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-bold
                                {{ $canFill
                                    ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300'
                                    : 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300' }}">
                                {{ $canFill ? 'مسموح' : 'غير مسموح' }}
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- Cards (Mobile & Tablet) --}}
        <div class="grid gap-4 md:hidden">
            @foreach($vehicles as $vehicle)
                @php
                    $lastFill = $vehicle->fuelings->sortByDesc('filled_at')->first();
                    $canFill = !$lastFill || now()->diffInDays($lastFill->filled_at) >= 3;
                @endphp

                <div class="bg-white dark:bg-gray-900 rounded-2xl p-4 shadow border border-gray-200 dark:border-gray-700">
                    <div class="flex justify-between items-start gap-2 mb-2">
                        <h3 class="font-bold text-gray-800 dark:text-gray-100 text-sm">
                            {{ $vehicle->name ?? 'سيارة' }}
                        </h3>

                        <span class="text-[10px] font-mono break-all text-gray-500">
                            {{ $vehicle->qr_code }}
                        </span>
                    </div>

                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">
                        آخر تعبئة:
                        <strong class="text-gray-800 dark:text-gray-200">
                            {{ $lastFill?->filled_at?->format('Y-m-d H:i') ?? '—' }}
                        </strong>
                    </p>

                    <span class="inline-block px-3 py-1 rounded-full text-xs font-bold
                        {{ $canFill
                            ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300'
                            : 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300' }}">
                        {{ $canFill ? 'مسموح بالتعبئة' : 'غير مسموح الآن' }}
                    </span>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $vehicles->links() }}
        </div>

    </div>
</div>
</x-app-layout>
