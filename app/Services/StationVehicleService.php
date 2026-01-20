<?php

namespace App\Services;

use App\Models\StationVehicleLog;
use Illuminate\Support\Facades\Auth;
class StationVehicleService
{
    public function getRegisterPageData(): array
    {
        $station = Auth::user();
        $logs = StationVehicleLog::with(['vehicle','user'])
            ->where('station_id', $station->id)
            ->latest('registered_at')
            ->take(10)
            ->get();

        return [
            'station' => $station,
            'logs'    => $logs,
        ];
    }
}