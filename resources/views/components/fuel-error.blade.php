@if(session('error'))
<div class="bg-red-50 dark:bg-red-900/40
            border border-red-300 dark:border-red-700
            text-red-800 dark:text-red-200
            p-4 rounded-2xl mb-4 transition-all">
    <div class="font-bold mb-1">
        {{ session('error')['message'] }}
    </div>

    <ul class="text-sm mt-2 space-y-1">
        <li>⏳ المتبقي: <strong>{{ session('error')['remaining_hours'] }}</strong> ساعة</li>
        <li>📅 تقريبًا: <strong>{{ session('error')['remaining_days'] }}</strong> أيام</li>
        <li>🕒 المسموح بعد: {{ session('error')['next_time'] }}</li>
    </ul>
</div>
@endif
