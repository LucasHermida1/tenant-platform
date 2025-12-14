<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tenant;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Cada vez que Laravel vea {{tenant}} pasa el modelo correspondiente
        Route::bind('tenant', function ($value) {
            return Tenant::where('slug', $value)->firstOrFail();
        });

        // 🔐 Redirect auth multi-tenant
        Authenticate::redirectUsing(function ($request) {
            $tenant = $request->route('tenant');

            // Caso 1: ya es modelo
            if ($tenant instanceof Tenant) {
                return route('tenant.login', [
                    'tenant' => $tenant->slug,
                ]);
            }

            // Caso 2: es string (slug)
            if (is_string($tenant)) {
                return route('tenant.login', [
                    'tenant' => $tenant,
                ]);
            }

            return null;
        });
    }
}
