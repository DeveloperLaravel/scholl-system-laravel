<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        th { background: #eee; }
    </style>
</head>
<body>

<h3 style="text-align:center">⛽ تقرير تعبئة الوقود</h3>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>كود السيارة</th>
            <th>تاريخ التعبئة</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fuels as $fuel)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $fuel->vehicle->qr_code }}</td>
            <td>{{ $fuel->filled_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
