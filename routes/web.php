<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('projects', ProjectController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Role Management Routes (Admin only)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

// Project Routes
Route::middleware(['auth', 'role:admin,manager'])->group(function () {

    // Only admin can create
    Route::middleware(['role:admin'])->group(function () {
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    });

    // Admin or manager can view
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::resource('tasks', TaskController::class);
    Route::resource('files', FileController::class);
});

require __DIR__.'/auth.php';
