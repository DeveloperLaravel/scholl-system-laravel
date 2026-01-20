<x-app-layout>
    <div class="max-w-3xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-6 text-center">🚗 تفاصيل السيارة</h2>

        <div class="bg-white shadow rounded-xl p-6 mb-6">
            <p><span class="font-semibold">رقم السيارة:</span> {{ $vehicle->plate_number }}</p>
            <p><span class="font-semibold">اسم المالك:</span> {{ $vehicle->owner_name }}</p>
        </div>

        <h3 class="text-xl font-semibold mb-4">🛢️ التعبئات الأخيرة</h3>
        <div class="overflow-x-auto bg-white shadow rounded-xl">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">كمية الوقود</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">تاريخ التعبئة</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">المدة المتبقية</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($vehicle->fuelings->sortByDesc('created_at') as $fuel)
                        @php
                            $expiry = $fuel->created_at->addDays(3);
                            $remaining = now()->diffInDays($expiry, false);
                            $expired = $remaining < 0;
                        @endphp
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $fuel->amount }} لتر</td>
                            <td class="px-6 py-4">{{ $fuel->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-6 py-4">
                                @if(!$expired)
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-semibold">
                                        {{ $remaining }} يوم متبقي
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-semibold">
                                        انتهت المدة
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('vehicles.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                🔙 العودة للسيارات
            </a>
        </div>
    </div>
</x-app-layout>
