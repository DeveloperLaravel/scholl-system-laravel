<!-- resources/views/fuel/create.blade.php -->
<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">⛽ تعبئة الوقود</h1>

        <!-- QR Code Input -->
        <form action="{{ route('fuel.fill.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="qr_code" class="block mb-2 font-semibold text-gray-700">📲 رمز QR للسيارة</label>
                <input type="text" name="qr_code" id="qr_code" placeholder="امسح رمز QR هنا"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       required>
                @error('qr_code')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="fuel_amount" class="block mb-2 font-semibold text-gray-700">💧 كمية الوقود (لتر)</label>
                <input type="number" step="0.1" name="fuel_amount" id="fuel_amount"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="أدخل كمية الوقود" required>
                @error('fuel_amount')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200">
                ✅ تسجيل التعبئة
            </button>
        </form>

        @if(session('success'))
            <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg">
                <p>{{ session('success') }}</p>
                @if(session('next_fill'))
                    <p>⏳ يمكنك تعبئة الوقود مرة أخرى بعد: <strong>{{ session('next_fill') }}</strong></p>
                @endif
            </div>
        @endif
    </div>
</x-app-layout>
