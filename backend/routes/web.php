<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WorkoutPlanController;
use App\Http\Controllers\StaffController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Members Routes
Route::resource('members', MemberController::class);

// Memberships Routes
Route::resource('memberships', MembershipController::class);

// Attendances Routes
Route::resource('attendances', AttendanceController::class)->except(['show']);

// Payments Routes
Route::resource('payments', PaymentController::class);

// Workout Plans Routes
Route::resource('workout-plans', WorkoutPlanController::class)->except(['show']);

// Staff Routes
Route::resource('staff', StaffController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
