<!doctype html>
<html lang="es" class="{{ auth()->user()?->theme === 'dark' ? 'dark' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Tenant Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="
        antialiased transition-colors duration-200
        bg-gray-50 text-gray-900
        dark:bg-gray-950 dark:text-gray-100
    "
    style="
        --color-primary: {{ $tenantSettings->primary_color ?? '#1e40af' }};
        --color-secondary: {{ $tenantSettings->secondary_color ?? '#0f172a' }};
        --color-accent: {{ $tenantSettings->accent_color ?? '#64748b' }};
    ">
    <div class="min-h-screen flex flex-col">

        @include('tenant.layouts.navbar')

        <div class="flex flex-1">
            @include('tenant.layouts.sidebar')

            <main class="flex-1 px-4 sm:px-6 lg:px-8 py-8">
                @yield('content')
            </main>
        </div>

    </div>
</body>

</html>
