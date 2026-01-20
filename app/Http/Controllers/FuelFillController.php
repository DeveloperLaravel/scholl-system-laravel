<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Vehicle;
use App\Models\FuelFill;
class FuelFillController extends Controller
{
      // صفحة التعبئة
    public function create()
    {
        return view('fuel.index');
    }

    // تنفيذ التعبئة
    public function store(Request $request)
    {
        $request->validate([
        'qr_code' => 'required|exists:vehicles,qr_code',
    ]);

    $vehicle = Vehicle::where('qr_code', $request->qr_code)->first();

    // آخر تعبئة
    $lastFill = FuelFill::where('vehicle_id', $vehicle->id)
        ->latest('created_at')
        ->first();

    if ($lastFill) {

        $nextAllowed = $lastFill->created_at->addDays(3);
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

    // تنفيذ التعبئة
    FuelFill::create([
        'vehicle_id' => $vehicle->id,
        'station_id' => auth()->user()->station_id,
        'user_id'    => auth()->id(),
        'filled_at'  => now(),
    ]);

    return back()->with('success', '✅ تمت تعبئة الوقود بنجاح');
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
        $vehicles = Vehicle::with('fuelings')->get();
        return view('fuel.fuel', compact('vehicles'));
    }

        public function fuelReport(Vehicle $vehicle)
    {
        // يمكن أن تعرض جميع التعبئات أو ملخصها
        $fuelings = $vehicle->fuelings()->orderByDesc('created_at')->get();

        return view('fuel.fuel_report', compact('vehicle', 'fuelings'));
    }
        public function showfuel(FuelFill $fuelFill)
    {
        return view('fuel.show', compact('fuelFill'));
    }

    
}
