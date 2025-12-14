<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <title>@yield('title', 'Proyecto Multi-Tenant')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="min-h-screen
           bg-gradient-to-br from-gray-50 via-white to-gray-100
           text-gray-900 antialiased">

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

</body>

</html>
