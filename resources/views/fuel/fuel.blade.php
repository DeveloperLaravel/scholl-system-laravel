<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-6 text-center">🚗 سيارات تم تعبئة الوقود</h2>

        <div class="flex justify-end mb-4">
            <a href="{{ route('reports.index') }}" 
               class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                📊 التقارير
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-xl">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">رقم السيارة</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">المالك</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">تاريخ آخر تعبئة</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">المدة المتبقية</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">فرق الوقت</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">أزرار</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($vehicles as $vehicle)
                        @php
                            $lastFueling = $vehicle->fuelings->sortByDesc('created_at')->first();
                            $remaining = $lastFueling ? now()->diffInDays($lastFueling->created_at->addDays(3)) : null;
                            $diff = $lastFueling ? now()->diffForHumans($lastFueling->created_at, ['short' => true]) : '-';
                        @endphp
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->plate_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->owner_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $lastFueling ? $lastFueling->created_at->format('Y-m-d H:i') : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($remaining !== null)
                                    @if($remaining > 0)
                                        <span class="text-green-600 font-semibold">{{ $remaining }} يوم</span>
                                    @else
                                        <span class="text-red-600 font-semibold">انتهت المدة</span>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $diff }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <a href="{{ route('fuel.show', $vehicle->id) }}"
                                   class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700">عرض</a>
                                <a href="{{ route('fuel.report', $vehicle->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600">تقرير الوقود</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($vehicles->isEmpty())
            <p class="text-center text-gray-500 mt-6">لا توجد سيارات تم تعبئتها بعد.</p>
        @endif
    </div>
</x-app-layout>
