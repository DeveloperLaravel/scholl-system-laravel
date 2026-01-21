<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\FuelFillController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // 👨‍💼 Admin فقط
    Route::middleware('role:admin')->group(function () {
        Route::resource('vehicles', VehicleController::class);
        Route::resource('stations', StationController::class);
       Route::get('vehicles/{vehicle}/print',
    [VehicleController::class, 'print'])->name('vehicles.print');

Route::post('vehicles/print/bulk',
    [VehicleController::class, 'printBulk'])->name('vehicles.print.bulk');

Route::post('vehicles/bulk-delete',
    [VehicleController::class, 'bulkDelete'])->name('vehicles.bulk.delete');

    Route::get('/fuel/create', [FuelFillController::class, 'create'])
    ->name('fuel.create');

Route::post('/fuel/fill', [FuelFillController::class, 'store'])
    ->name('fuel.fill.store');
    Route::post('/fuel/scan', [FuelFillController::class, 'scan'])
    ->name('fuel.scan.store');

    
    // Route::get('/fuel', [FuelFillController::class, 'fuel'])
    // ->name('fuel');


// // عرض تفاصيل السيارة
// Route::get('/fuels/{fuel}', [FuelFillController::class, 'showfuel'])->name('fuel.show');

// // تقرير التعبئة لكل سيارة
// Route::get('/vehicles/{vehicle}/fuel-report', [FuelFillController::class, 'fuelReport'])->name('fuel.report');

// تقرير شامل لكل السيارات (اختياري)
Route::get('/reports', [FuelFillController::class, 'allReports'])->name('reports.index');




Route::get('/fuels/report/pdf', [FuelFillController::class, 'reportPdf'])
    ->name('fuel.pdf');











    });
    });

    // ⛽ Employee فقط
    Route::middleware('role:employee')->group(function () {

Route::post('/fuel/fill', [FuelFillController::class, 'store'])
    ->name('fuel.fill.store');
    Route::post('/fuel/scan', [FuelFillController::class, 'scan'])
    ->name('fuel.scan.store');

    
    Route::get('/fuel', [FuelFillController::class, 'fuel'])
    ->name('fuel');


// عرض تفاصيل السيارة
Route::get('/fuels/{fuel}', [FuelFillController::class, 'showfuel'])->name('fuel.show');

// تقرير التعبئة لكل سيارة
Route::get('/fuels/{fuel}/fuel-report', [FuelFillController::class, 'fuelReport'])->name('fuel.report');

// تقرير شامل لكل السيارات (اختياري)
Route::get('/reports', [FuelFillController::class, 'allReports'])->name('reports.index');



});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
