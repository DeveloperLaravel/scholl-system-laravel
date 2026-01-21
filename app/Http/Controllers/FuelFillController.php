<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Vehicle;
use App\Models\FuelFill;
use Barryvdh\DomPDF\Facade\Pdf;

class FuelFillController extends Controller
{
      public function index()
    {
        return view('fuel.index');
    }
      // صفحة التعبئة
    public function create()
    {
        return view('fuel.create');
    }

    // تنفيذ التعبئة
public function store(Request $request)
{
    $request->validate([
        'qr_code' => 'required|exists:vehicles,qr_code',
    ]);

    $vehicle = Vehicle::where('qr_code', $request->qr_code)->firstOrFail();

    // آخر تعبئة
    $lastFill = FuelFill::where('vehicle_id', $vehicle->id)
        ->latest('filled_at')
        ->first();

    if ($lastFill) {

        $nextAllowed = $lastFill->filled_at->addDays(3);
        $now = now();

        if ($now->lt($nextAllowed)) {

            $remainingHours = $now->diffInHours($nextAllowed);
            $remainingDays  = ceil($remainingHours / 24);

            return back()->with('error', [
                'message' => '🚫 لا يمكن تعبئة الوقود الآن',
                'remaining_hours' => $remainingHours,
                'remaining_days' => $remainingDays,
                'next_time' => $nextAllowed->format('Y-m-d H:i'),
            ]);
        }
    }

    // ✅ حفظ التعبئة
    FuelFill::create([
        'vehicle_id' => $vehicle->id,
        'station_id' => auth()->user()->station_id ?? null,
        'filled_at'  => now(),
    ]);
    return redirect()->route('vehicles.index')->with('success', 'تم تعبئة الوقود بنجاح ✅');

}


public function scan(Request $request)
{
    $request->validate([
        'qr_code' => 'required|string'
    ]);

    $vehicle = Vehicle::where('qr_code', $request->qr_code)->first();

    if (! $vehicle) {
        return response()->json([
            'message' => '❌ السيارة غير موجودة'
        ], 404);
    }

    $lastFill = FuelFill::where('vehicle_id', $vehicle->id)
        ->latest()
        ->first();

    if ($lastFill && Carbon::now()->diffInDays($lastFill->created_at) < 3) {
        return response()->json([
            'message' => '⛔ لم تنتهِ مهلة 3 أيام بعد'
        ], 403);
    }

    FuelFill::create([
        'vehicle_id' => $vehicle->id,
        'liters' => 10, // مثال
        'station_id' => auth()->user()->station_id
    ]);

    return response()->json([
        'message' => '✅ تم تعبئة الوقود بنجاح'
    ]);
}

  public function fuel()
    {
            // جلب جميع السيارات مع آخر تعبئة لكل واحدة
        $vehicles = Vehicle::with('fuelings')->latest()->paginate(10);
        return view('fuel.fuel', compact('vehicles'));
    }

        public function fuelReport(Vehicle $vehicle)
    {
        // يمكن أن تعرض جميع التعبئات أو ملخصها
        $fuelings = $vehicle->fuelings()->orderByDesc('filled_at')->get();

        return view('fuel.fuel_report', compact('vehicle', 'fuelings'));
    }
        public function showfuel(FuelFill $fuelFill)
    {
        return view('fuel.show', compact('fuelFill'));
    }


     public function report()
    {
        $fuels = FuelFill::with('vehicle')
            ->latest()
            ->paginate(10);

        return view('fuel.report', compact('fuels'));
    }
      public function reportPdf()
    {
        $fuels = FuelFill::with('vehicle')->latest()->get();

        $pdf = Pdf::loadView('fuel.report-pdf', compact('fuels'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('fuel-report.pdf');
    }

    
}
