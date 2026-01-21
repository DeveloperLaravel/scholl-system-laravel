@props(['vehicle'])

<tr class="border-b hover:bg-gradient-to-r hover:from-red-50 hover:to-yellow-50 dark:hover:from-gray-700 dark:hover:to-gray-800 transition-all">
    <td class="p-3 text-center">
        <input type="checkbox" class="vehicle-checkbox accent-red-500" value="{{ $vehicle->id }}">
    </td>
    <td class="p-3 text-center font-medium">{{ $vehicle->plate_number }}</td>
    <td class="p-3 text-center">{{ $vehicle->owner_name }}</td>
    <td class="p-3 text-center">{{ $vehicle->station->name ?? 'كل المحطات' }}</td>
    <td class="p-3 text-center">{!! QrCode::size(50)->generate($vehicle->qr_code) !!}</td>
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
