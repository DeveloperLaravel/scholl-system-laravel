<x-app-layout>
<div class="max-w-md mx-auto bg-white p-6 rounded-2xl shadow-lg border">


    {{-- العنوان --}}
    <div class="text-center mb-6">
        <div class="text-3xl">⛽</div>
        <h2 class="text-xl font-bold mt-2">تعبئة الوقود</h2>
        <p class="text-sm text-gray-500">اختر طريقة إدخال QR</p>
    </div>
    {{-- مكان الكاميرا --}}
    <div id="reader" class="w-full border rounded-lg"></div>

    {{-- رسائل --}}
    <div id="result" class="mt-4 text-center text-green-600 font-bold"></div>


  
@if(session('error'))
    <div class="bg-red-50 border border-red-300 text-red-800 p-4 rounded-xl mb-4">
        <div class="font-bold mb-1">
            {{ session('error')['message'] }}
        </div>

        <ul class="text-sm mt-2 space-y-1">
            <li>⏳ المتبقي: <strong>{{ session('error')['remaining_hours'] }}</strong> ساعة</li>
            <li>📅 أو تقريبًا: <strong>{{ session('error')['remaining_days'] }}</strong> أيام</li>
            <li>🕒 المسموح بعد: {{ session('error')['next_time'] }}</li>
        </ul>
    </div>
@endif

    {{-- الفورم --}}
    <form method="POST" action="{{ route('fuel.fill.store') }}" id="fuel-form">
        @csrf

        <input
            type="text"
            id="qr_code"
            name="qr_code"
            autofocus
            placeholder="امسح أو أدخل الكود"
            class="w-full border-2 border-dashed rounded-xl p-3 text-center text-lg tracking-widest
                   focus:border-green-500 focus:ring-green-500"
            required
        >

        <button
            type="submit"
            class="w-full mt-4 bg-green-600 text-white py-2.5 rounded-xl
                   hover:bg-green-700 transition font-semibold">
            ⛽ تنفيذ التعبئة
        </button>
    </form>

    {{-- الكاميرا --}}
    <div id="reader"
         class="mt-4 hidden rounded-xl overflow-hidden border border-gray-200 shadow-inner">
    </div>

    <p class="text-xs text-gray-400 mt-4 text-center">
        ⏱️ يسمح بالتعبئة مرة واحدة كل 3 أيام
    </p>

</div>

{{-- مكتبة الكاميرا --}}
<script src="https://unpkg.com/html5-qrcode"></script>

<script>
    function onScanSuccess(decodedText) {
        document.getElementById('result').innerText =
            '✅ تم قراءة الكود: ' + decodedText;

        // إيقاف الكاميرا بعد النجاح
        html5QrcodeScanner.clear();

        // إرسال الكود إلى Laravel
        fetch("{{ route('fuel.scan.store') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                qr_code: decodedText
            })
        })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
        });
    }

    function onScanFailure(error) {
        // تجاهل الأخطاء المتكررة
    }

    const html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: 250 },
        false
    );

    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
</x-app-layout>
