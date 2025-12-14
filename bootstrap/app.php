<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions;

return Application::configure(basePath: dirname(__DIR__))

    // SIN ESTO NO FUNCIONA EL FRAMEWORK
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    // Registramos el middleware tenant correctamente
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'tenant' => \App\Http\Middleware\TenantMiddleware::class,
        ]);

        $middleware->priority([
            // 🔹 Routing & bindings (CRÍTICO)
            \Illuminate\Routing\Middleware\SubstituteBindings::class,

            // 🔹 Sessions
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,

            // 🔹 Tenant BEFORE auth
            \App\Http\Middleware\TenantMiddleware::class,

            // 🔹 Auth
            \Illuminate\Auth\Middleware\Authenticate::class,
            \Illuminate\Auth\Middleware\Authorize::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
