<?php

use App\Http\Controllers\API\V1\AuthenticationController;
use App\Http\Controllers\API\V1\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Limited Request Hit in Booking Route

/**
 * throttle:3 for default limit block
 * 
 * throttle:custom-booking-limit : For custom limit
 */
Route::middleware(['auth:sanctum', 'throttle:custom-booking-limit'])->group(function () {
    Route::apiResource('v1/bookings', BookingController::class);
});

// Booking Route
// Route::apiResource('v1/bookings', BookingController::class)->middleware('auth:sanctum');

// register user to create token 
Route::post('v1/register', [AuthenticationController::class, 'register'])->name('register');

//login user
Route::post('v1/login', [AuthenticationController::class, 'login'])->name('login');

// revoke api
Route::post('v1/revoke-token', [AuthenticationController::class, 'revokeToken'])->name('revoke.token');

// 