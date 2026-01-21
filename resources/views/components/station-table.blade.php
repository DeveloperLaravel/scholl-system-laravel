<div class="overflow-x-auto">
    <table class="w-full text-sm border-collapse">
        <thead class="bg-slate-100 dark:bg-gray-800">
            <tr>
                <th class="p-3 text-right text-gray-700 dark:text-gray-200">الاسم</th>
                <th class="p-3 text-right text-gray-700 dark:text-gray-200">الموقع</th>
                <th class="p-3 text-center text-gray-700 dark:text-gray-200">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stations as $station)
                <tr class="border-b hover:bg-slate-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    <td class="p-3">{{ $station->name }}</td>
                    <td class="p-3">{{ $station->location ?? '-' }}</td>
                    <td class="p-3 text-center flex flex-col sm:flex-row justify-center gap-2 sm:gap-1">

                        {{-- <a href="{{ route('stations.edit', $station) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded transition duration-200 text-center">
                            تعديل
                        </a> --}}
                        <form method="POST" action="{{ route('stations.destroy', $station) }}" 
                              class="inline-block" onsubmit="return confirm('هل أنت متأكد؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition duration-200 text-center">
                                حذف
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-500 dark:text-gray-400">
                        لا توجد محطات حالياً
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
