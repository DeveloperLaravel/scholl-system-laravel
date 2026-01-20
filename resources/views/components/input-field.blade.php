@props(['name', 'label', 'value' => '', 'placeholder' => '', 'ringColor' => 'red'])

<div>
    <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">{{ $label }}</label>
    <input name="{{ $name }}" 
           value="{{ $value }}" 
           placeholder="{{ $placeholder }}"
           class="w-full border border-gray-300 dark:border-gray-700 rounded-xl p-3 focus:ring-2 focus:ring-{{ $ringColor }}-500 dark:bg-gray-800 dark:text-white transition">
</div>
