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
Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn (Request $r) => $r->user());
    Route::post('/logout', [AuthController::class, 'logout']);
});
