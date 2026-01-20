<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>بطاقة سيارة</title>

    <style>
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: 'Tahoma', Arial, sans-serif;
            text-align: center;
            color: #000;
        }

        .card {
            border: 2px dashed #000;
            padding: 30px;
            height: 100%;
        }

        .header {
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 16px;
            color: #444;
        }

        .info {
            margin: 25px 0;
            font-size: 18px;
            text-align: right;
        }

        .info p {
            margin: 8px 0;
        }

        .qr {
            margin: 30px 0;
        }

        .footer {
            margin-top: 30px;
            font-size: 18px;
            font-weight: bold;
        }

        .note {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }

        .print-btn {
            margin-top: 30px;
        }

        @media print {
            .print-btn {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="card">

        {{-- العنوان --}}
        <div class="header">
            <h1>نظام إدارة الوقود</h1>
            <p>بطاقة تعريف السيارة</p>
        </div>

        {{-- بيانات السيارة --}}
        <div class="info">
            <p>🚗 <strong>رقم اللوحة:</strong> {{ $vehicle->plate_number }}</p>
            <p>👤 <strong>المالك:</strong> {{ $vehicle->owner_name }}</p>
            <p>⛽ <strong>المحطة:</strong> {{ $vehicle->station->name ?? 'جميع المحطات' }}</p>
      
        </div>

        {{-- QR Code --}}
        <div class="qr">
            {!! QrCode::size(260)->generate($vehicle->qr_code) !!}
        </div>

        {{-- شكر --}}
        <div class="footer">
            نشكركم على استخدام نظامنا 🌿
        </div>

        <div class="note">
            يرجى إبراز هذا الرمز عند تعبئة الوقود
        </div>

     


          <p class="print-only"  style="font-size:20px; font-weight:bold;">
    🔢 <strong>رقم الكود:</strong> {{ $vehicle->qr_code }}
</p>
   {{-- زر الطباعة --}}
        <div class="print-btn">
            <button onclick="window.print()"
                style="padding: 10px 25px; font-size: 16px;">
                🖨️ طباعة
            </button>
        </div>

    </div>

</body>
</html>
