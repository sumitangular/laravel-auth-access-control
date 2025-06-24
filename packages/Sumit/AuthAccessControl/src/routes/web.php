<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('auth.dashboard');
    })->name('dashboard');
});


// Admin routes for role management
use App\Http\Controllers\Admin\RoleController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/assign', [RoleController::class, 'assignForm'])->name('roles.assign');
    Route::post('/roles/assign', [RoleController::class, 'assign'])->name('roles.assign.save');
});

Route::view('/vue-dashboard', 'vue_dashboard')->middleware(['auth'])->name('vue.dashboard');
