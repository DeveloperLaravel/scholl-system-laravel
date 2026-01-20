<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // << مهم جداً

class StationController extends Controller
{
    // عرض جميع المحطات
    public function index()
    {
        $stations = Station::latest()->get();
        return view('stations.index', compact('stations'));
    }

    // نموذج إضافة محطة جديدة
    public function create()
    {
        return view('stations.create');
    }

    // حفظ محطة جديدة
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email', // البريد لمحطة المستخدم
        'password' => 'required|string|min:6|confirmed',
    ]);

    // 1️⃣ إنشاء المحطة
    $station = Station::create([
        'name' => $request->name,
        'location' => $request->location,
    ]);

    // 2️⃣ إنشاء المستخدم المرتبط بالمحطة
    $user = User::create([
        'name' => $station->name, // يمكن استخدام اسم المحطة
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'employee', // دور محطة
        'station_id' => $station->id,
    ]);

    return redirect()->route('stations.index')->with('success', 'تمت إضافة المحطة والمستخدم بنجاح');
}

    // تحديث المحطة
    public function update(Request $request, Station $station)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        $station->update($request->all());

        return redirect()->route('stations.index')->with('success', 'تم تعديل المحطة بنجاح');
    }

    // حذف المحطة
    public function destroy(Station $station)
    {
        $station->delete();
        return back()->with('success', 'تم حذف المحطة');
    }
}
