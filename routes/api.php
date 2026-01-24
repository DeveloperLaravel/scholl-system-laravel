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
    Route::post('/register', [AuthController::class, 'register']);

    // تسجيل الدخول
    Route::post('/login', [AuthController::class, 'login']);

    // تسجيل الخروج
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

    // بيانات المستخدم
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return response()->json($request->user());
    });