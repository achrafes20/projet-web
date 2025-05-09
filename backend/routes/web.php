<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EquipmentController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Dashboard Route
Route::get('/', [HomeController::class, 'index'])->middleware('auth');

// Resource Routes
Route::middleware('auth')->group(function () {
    Route::resource('members', MemberController::class);
    Route::resource('memberships', MembershipController::class);
    Route::resource('trainers', TrainerController::class);
    Route::resource('workouts', WorkoutController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('equipment', EquipmentController::class);
});