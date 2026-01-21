@props(['vehicles'])

@php
// تأكد أن $vehicles هي Collection أو قائمة قابلة للتكرار
$vehicles = collect($vehicles);

// حدد الحد الأقصى للعرض
$vehicles = $vehicles->take(50);
@endphp

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
            @forelse($vehicles as $vehicle)
                <tr class="border-b hover:bg-gradient-to-r hover:from-red-50 hover:to-yellow-50 dark:hover:from-gray-700 dark:hover:to-gray-800 transition-all">
                    <td class="p-3 text-center">
                        <input type="checkbox" class="vehicle-checkbox accent-red-500" value="{{ $vehicle->id }}">
                    </td>
                    <td class="p-3 text-center font-medium">{{ $vehicle->plate_number ?? '-' }}</td>
                    <td class="p-3 text-center">{{ $vehicle->owner_name ?? '-' }}</td>
                    <td class="p-3 text-center">{{ $vehicle->station->name ?? 'كل المحطات' }}</td>
                    <td class="p-3 text-center">
                        @if(!empty($vehicle->qr_code))
                            {!! QrCode::size(50)->generate($vehicle->qr_code) !!}
                        @else
                            -
                        @endif
                    </td>
                    <td class="p-3 text-center">
                        @if(!empty($vehicle->id))
                            <a href="{{ route('vehicles.print', $vehicle) }}" target="_blank"
                               class="bg-gradient-to-r from-green-400 to-lime-300 text-white px-3 py-1 rounded-lg shadow hover:scale-105 transition-transform inline-block">
                               🖨️
                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="p-3 text-center">
                        @if(!empty($vehicle->id))
                        <form method="POST" action="{{ route('vehicles.destroy', $vehicle) }}" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 font-semibold hover:underline">حذف</button>
                        </form>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500 dark:text-gray-400">
                        لا توجد سيارات للعرض
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- حماية checkbox select-all حتى لو لم يكن هناك أي عناصر --}}
<script>
    const selectAll = document.getElementById('select-all');
    if(selectAll) {
        selectAll.addEventListener('change', function () {
            document.querySelectorAll('.vehicle-checkbox').forEach(cb => cb.checked = this.checked);
        });
    }
</script>
