<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\Auth\LoginController;
use App\Http\Controllers\Tenant\DashboardController;
use App\Http\Controllers\Tenant\AppearanceController;
use App\Http\Controllers\Tenant\ProfileController;


// ===============================
// LOGIN TENANT
// ===============================
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('tenant.login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('tenant.login.submit');

// ===============================
// RUTAS PROTEGIDAS TENANT
// ===============================
Route::middleware(['auth:tenant'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('tenant.dashboard');

    // LOGOUT
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('tenant.logout');

    // ===============================
    // CONFIGURACIÓN / APARIENCIA / PERFIL
    // ===============================
    Route::get('/settings/appearance', [AppearanceController::class, 'index'])
        ->name('tenant.settings.appearance');

    Route::post('/settings/appearance/toggle-theme', [AppearanceController::class, 'toggleTheme'])
        ->name('tenant.appearance.toggle-theme');

    Route::get('/settings/profile', [ProfileController::class, 'index'])
        ->name('tenant.settings.profile');
});
