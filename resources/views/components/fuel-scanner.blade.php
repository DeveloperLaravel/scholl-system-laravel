<div id="reader" class="mt-4 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-inner"></div>
<div id="result" class="mt-4 text-center font-bold text-green-600 dark:text-green-400"></div>

<script src="https://unpkg.com/html5-qrcode"></script>
<script>
function onScanSuccess(decodedText) {
    document.getElementById('result').innerText = '✅ تم قراءة الكود: ' + decodedText;
    html5QrcodeScanner.clear();
    fetch("{{ route('fuel.scan.store') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ qr_code: decodedText })
    })
    .then(res => res.json())
    .then(data => { alert(data.message); });
}

function onScanFailure(error) {
    // يمكن تجاهل الأخطاء المتكررة
}

const html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 }, false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
