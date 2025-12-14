<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Tenant;
use App\Models\TenantSetting;

/**
 * TenantMiddleware
 *
 * Responsabilidades:
 * 1) Resolver el tenant desde la URL
 * 2) Setear la DB correcta del tenant
 * 3) Exponer branding/configuración del tenant al frontend
 *
 * ⚠️ Se ejecuta ANTES de auth
 */
class TenantMiddleware
{
    public function handle($request, Closure $next)
    {
        // 🔑 Resolver tenant
        $tenant = $request->route('tenant');

        if (! $tenant instanceof Tenant) {
            abort(404);
        }

        // 🔑 Setear DB del tenant
        config([
            'database.default' => 'tenant',
            'database.connections.tenant.database' => $tenant->database,
        ]);

        DB::purge('tenant');
        DB::reconnect('tenant');

        // 🔑 Branding / configuración del tenant
        $tenantSettings = TenantSetting::query()->first();

        // 🔑 Compartir contexto global del tenant
        View::share('tenant', $tenant);
        View::share('tenantSettings', $tenantSettings);

        return $next($request);

    }
}
