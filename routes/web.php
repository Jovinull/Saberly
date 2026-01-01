<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\InstructorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Admin Login */
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'destroy'])
        ->name('logout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Instructor Login */
Route::get('/instructor/login', [InstructorController::class, 'login'])->name('instructor.login');

Route::middleware(['auth', 'verified', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/dashboard', [InstructorController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [InstructorController::class, 'destroy'])
        ->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
