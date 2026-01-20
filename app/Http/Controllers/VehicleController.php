<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Vehicle;
use App\Models\Station;
use Illuminate\Support\Str;
class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('station')->latest()->paginate(10);
        return view('vehicles.index', compact('vehicles'));
    }

  
    public function create()
    {
        $stations = Station::all();
        return view('vehicles.create', compact('stations'));
    }

    public function store(Request $request)
    {
         $data  = $request->validate([
            'plate_number'      => 'required|string|max:255|unique:vehicles',
            'chassis_number'   => 'required|string|max:255|unique:vehicles',
            'owner_name'       => 'required|string|max:255',
            'owner_nationality'=> 'nullable|string|max:255',
            'station_id'       => 'nullable|exists:stations,id',
        ]);
           $data['qr_code'] = $this->generateQrCode();

        Vehicle::create($data);

        // $vehicle = Vehicle::create([
        //     'plate_number' => $request->plate_number,
        //     'owner_name' => $request->owner_name,
        //     'station_id' => $request->station_id,
        //     'qr_code' => uniqid('QR-'), // توليد QR تلقائي
        // ]);

        return redirect()->route('vehicles.index')
                         ->with('success', 'تمت إضافة السيارة بنجاح');
    }


    public function update(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate([
    'plate_number'      => 'required|unique:vehicles,plate_number,' . $vehicle->id ?? null,
    'chassis_number'   => 'required|unique:vehicles,chassis_number,' . $vehicle->id ?? null,
    'owner_name'       => 'required|string|min:3',
    'owner_nationality'=> 'nullable|string',
    'station_id'       => 'nullable|exists:stations,id',
], [
    'plate_number.required' => 'رقم اللوحة مطلوب',
    'plate_number.unique'   => 'رقم اللوحة مستخدم مسبقًا',
    'chassis_number.required' => 'رقم الهيكل مطلوب',
    'chassis_number.unique'   => 'رقم الهيكل مستخدم مسبقًا',
    'owner_name.required'  => 'اسم المالك مطلوب',
]);

        $vehicle->update($data);

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'تم تحديث بيانات السيارة');
    }






    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return back()->with('success', 'تم حذف السيارة');
    }
    
//   private function generateQr(): string
//     {
//         return 'VEH-' . strtoupper(Str::random(17));
//     }
    private function generateQrCode(): string
    {
        return 'VEH-' . strtoupper(Str::random(10));
    }

public function print(Vehicle $vehicle)
{
    return view('vehicles.print', compact('vehicle'));
}

public function printBulk(Request $request)
{
    $request->validate([
        'vehicles' => 'required|array'
    ]);

    $vehicles = Vehicle::with('station')
        ->whereIn('id', $request->vehicles)
        ->get();

    return view('vehicles.print-bulk-a4', compact('vehicles'));
}

public function bulkDelete(Request $request)
{
    $request->validate([
        'vehicles' => 'required|array'
    ]);

    Vehicle::whereIn('id', $request->vehicles)->delete();

    return back()->with('success', 'تم حذف السيارات المحددة');
}

}