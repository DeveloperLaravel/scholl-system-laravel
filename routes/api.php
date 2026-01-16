<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Routes جاهزة للـ Flutter API:
| - تسجيل دخول (login)
| - تسجيل خروج (logout)
| - تسجيل مستخدم جديد (register)
| - بيانات المستخدم (user)
|
*/

// تسجيل مستخدم جديد
Route::post('/register', [AuthController::class, 'register'])->name('api.register');

// تسجيل الدخول
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

// كل ما يلي يحتاج توكن (auth:sanctum)
Route::middleware('auth:sanctum')->group(function () {

    // بيانات المستخدم
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    })->name('api.user');

    // تسجيل الخروج
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
});
