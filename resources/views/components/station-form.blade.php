<div class="w-full bg-white dark:bg-gray-900 rounded-2xl shadow-2xl p-6 sm:p-8 md:p-10 transition-colors duration-500">

    @if(isset($title))
        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800 dark:text-gray-100 text-center">{{ $title }}</h2>
    @endif

    <form method="{{ $method ?? 'POST' }}" action="{{ $action }}" class="space-y-5">

        @csrf
        @if(isset($method) && strtoupper($method) !== 'POST')
            @method($method)
        @endif

        {{-- الحقول الديناميكية --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($fields as $field)
                <div>
                    <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-200">{{ $field['label'] }}</label>
                    <input 
                        name="{{ $field['name'] }}"
                        type="{{ $field['type'] ?? 'text' }}"
                        value="{{ old($field['name'], $field['value'] ?? '') }}"
                        placeholder="{{ $field['placeholder'] ?? '' }}"
                        required="{{ $field['required'] ?? false }}"
                        class="w-full border border-gray-300 dark:border-gray-700 rounded-xl p-3
                               focus:ring-2 focus:ring-blue-500 focus:outline-none
                               bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100
                               transition duration-300">
                    @error($field['name'])
                        <p class="text-red-500 mt-1 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        {{-- زر الإرسال --}}
        <button type="submit"
                class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                       text-white font-semibold py-3 px-6 rounded-xl shadow-md
                       transition duration-300 transform hover:scale-105">
            {{ $buttonText ?? 'حفظ' }}
        </button>
    </form>
</div>
