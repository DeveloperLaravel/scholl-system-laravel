<form method="POST" action="{{ $action }}" class="mt-4 space-y-4">
    @csrf

    <input
        type="text"
        id="qr_code"
        name="qr_code"
        autofocus
        required
        placeholder="امسح أو أدخل كود السيارة"
        class="
            w-full rounded-2xl border-2 border-dashed
            px-4 py-3 text-center text-lg tracking-widest
            bg-gray-50 dark:bg-gray-800
            text-gray-900 dark:text-gray-100
            border-gray-300 dark:border-gray-600
            focus:outline-none
            focus:border-green-500
            focus:ring-4 focus:ring-green-500/30
            transition-all
        "
    >

    <button
        type="submit"
        class="
            w-full py-3 rounded-2xl font-bold text-white
            bg-gradient-to-r from-green-500 to-emerald-600
            dark:from-green-400 dark:to-emerald-500
            hover:scale-[1.02] active:scale-95
            transition-all
        "
    >
        ⛽ تنفيذ التعبئة
    </button>
</form>
