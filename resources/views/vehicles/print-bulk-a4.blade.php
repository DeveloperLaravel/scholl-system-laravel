<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>طباعة سيارات</title>
    <style>
        @page { size: A4; margin: 15mm; }
        body { font-family: Tahoma; }
        .card {
            border: 2px dashed #000;
            padding: 20px;
            margin-bottom: 20px;
            page-break-after: always;
            text-align: center;
        }
    </style>
</head>
<body>

@foreach($vehicles as $vehicle)
    <div class="card">
        <p><strong>🚗 اللوحة:</strong> {{ $vehicle->plate_number }}</p>
        <p><strong>👤 المالك:</strong> {{ $vehicle->owner_name }}</p>

        {!! QrCode::size(220)->generate($vehicle->qr_code) !!}
    </div>
@endforeach

<script>window.print()</script>
</body>
</html>
