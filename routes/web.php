<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StylistController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\DashboardController;




Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('stylists', StylistController::class);
    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index'); // View appointments
    Route::post('appointments/{id}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
});
