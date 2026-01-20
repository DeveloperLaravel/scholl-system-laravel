<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\{Vehicle, Station, StationVehicleLog};
use App\Models\Vehicle;
use App\Models\StationVehicleLog;
use App\Services\StationVehicleService;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
class StationVehicleController extends Controller
{
 public function __construct(
        private StationVehicleService $stationVehicleService
    ) {}

    public function create()
    {
        $data = $this->stationVehicleService->getRegisterPageData();

        return view('station_vehicle.register', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|exists:vehicles,qr_code',
        ]);

        $station = Auth::user();
        $user = Auth::user();
        $vehicle = Vehicle::where('qr_code', $request->qr_code)->first();

        $lastLog = StationVehicleLog::where('station_id', $station->id)
            ->where('vehicle_id', $vehicle->id)
            ->latest('registered_at')
            ->first();

        if ($lastLog && Carbon::parse($lastLog->registered_at)->addDays(3)->isFuture()) {
            return back()->with('error', '❌ لا يمكن تسجيل السيارة إلا بعد 3 أيام');
        }

        StationVehicleLog::create([
            'station_id' => $station->id,
            'vehicle_id' => $vehicle->id,
            'user_id' => $user->id,
            'registered_at' => now(),
        ]);

        return back()->with('success', '✅ تم تسجيل السيارة بنجاح');
    }
    }
