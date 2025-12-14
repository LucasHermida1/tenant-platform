<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tenant;

// ===============================
// Home público global
// ===============================
Route::get('/', function () {
    return view('global.home');
});

// ===============================
// Seleccionar federación (lista de tenants)
// ===============================
Route::get('/seleccionar-federacion', function () {
    $tenants = Tenant::all(); // usa DB central
    return view('global.select-federation', compact('tenants'));
})->name('federations.select');

// ===============================
// RUTAS TENANT
// ===============================
Route::prefix('tenant/public/{tenant}')
    ->middleware(['tenant']) // 👈 middleware SIEMPRE acá
    ->group(function () {
        require base_path('routes/tenant.php');
    });
