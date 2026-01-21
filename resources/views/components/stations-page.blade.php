<div class="min-h-screen bg-gradient-to-br from-red-100 via-yellow-50 to-red-200
            dark:from-gray-900 dark:to-gray-800 p-4 sm:p-6 md:p-8 transition-colors duration-500">

    <div class="max-w-7xl mx-auto bg-white dark:bg-gray-900 rounded-2xl shadow-2xl p-4 sm:p-6 md:p-8 transition-colors duration-500">

        {{-- العنوان + زر إضافة --}}
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
            <h2 class="text-xl font-bold mb-3 sm:mb-0 text-gray-800 dark:text-gray-100">🏭 المحطات</h2>
            <a href="{{ route('stations.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 text-center">
                + إضافة محطة
            </a>
        </div>

        {{-- رسائل النجاح --}}
        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 p-3 rounded mb-4 transition-colors duration-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- جدول المحطات --}}
        <x-station-table :stations="$stations" />
    </div>
</div>
