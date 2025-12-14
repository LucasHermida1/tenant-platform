<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Acceso – {{ $tenantSettings->brand_name ?? $tenant->name }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="min-h-screen flex items-center justify-center
           bg-gradient-to-br from-gray-50 via-white to-gray-100
           text-gray-900 antialiased"
    style="
        --color-primary: {{ $tenantSettings->primary_color ?? '#1e40af' }};
        --color-secondary: {{ $tenantSettings->secondary_color ?? '#0f172a' }};
        --color-accent: {{ $tenantSettings->accent_color ?? '#64748b' }};
    ">

    <div
        class="relative w-full max-w-md
               rounded-3xl bg-white/80 backdrop-blur-md
               border border-gray-200
               shadow-xl px-8 py-10">

        {{-- BACK --}}
        <a href="{{ route('federations.select') }}"
            class="absolute top-4 left-4
          inline-flex items-center justify-center
          h-9 w-9
          rounded-full
          bg-white
          border border-gray-200
          text-gray-600
          shadow-sm
          transition-all duration-200
          hover:bg-[color:var(--color-secondary)]
          hover:text-white
          hover:border-[color:var(--color-secondary)]
          hover:shadow-md
          focus-visible:outline-none
          focus-visible:ring-2
          focus-visible:ring-[color:var(--color-primary)]
          focus-visible:ring-offset-2"
            title="Volver al selector">
            <i class="fa-solid fa-arrow-left text-sm"></i>
        </a>

        {{-- Decorative background --}}
        <div class="pointer-events-none absolute inset-0">
            <div
                class="absolute -top-20 -right-20
                       h-60 w-60
                       rounded-full bg-gray-100 blur-3xl">
            </div>
        </div>

        <div class="relative">

            {{-- BRAND --}}
            <div class="flex flex-col items-center gap-3 mb-8">

                {{-- LOGO --}}
                @if (!empty($tenantSettings?->logo_path))
                    <img src="{{ asset($tenantSettings->logo_path) }}"
                        alt="Logo {{ $tenantSettings->brand_name ?? $tenant->name }}"
                        class="h-12 w-12 rounded-2xl object-contain
                               bg-white shadow-md" />
                @else
                    <div
                        class="h-12 w-12 rounded-2xl
                               bg-[color:var(--color-secondary)]
                               shadow-md">
                    </div>
                @endif

                <div class="text-center">
                    <p class="text-xs uppercase tracking-wider text-gray-500">
                        {{ $tenantSettings->brand_name ?? 'Tenant' }}
                    </p>
                    <h1 class="text-xl font-semibold text-gray-900">
                        {{ $tenantSettings->brand_name ?? $tenant->name }}
                    </h1>

                    @if (!empty($tenantSettings?->slogan))
                        <p class="text-sm text-gray-500">
                            {{ $tenantSettings->slogan }}
                        </p>
                    @endif
                </div>
            </div>

            {{-- ERROR --}}
            @if ($errors->any())
                <div
                    class="mb-6 rounded-xl
                           bg-red-50 border border-red-200
                           px-4 py-3 text-sm text-red-700
                           flex items-center gap-2">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            {{-- FORM --}}
            <form method="POST" action="{{ route('tenant.login.submit', ['tenant' => $tenant->slug]) }}"
                class="flex flex-col gap-4">
                @csrf

                {{-- EMAIL --}}
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-gray-600">
                        Email
                    </label>
                    <input type="email" name="email" required autofocus
                        class="rounded-xl border border-gray-300
                               bg-white px-4 py-2.5
                               text-sm
                               transition-all duration-200
                               focus:border-[color:var(--color-secondary)]
                               focus:ring-2
                               focus:ring-[color:var(--color-primary)]
                               focus:outline-none">
                </div>

                {{-- PASSWORD --}}
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-gray-600">
                        Contraseña
                    </label>
                    <input type="password" name="password" required
                        class="rounded-xl border border-gray-300
                               bg-white px-4 py-2.5
                               text-sm
                               transition-all duration-200
                               focus:border-[color:var(--color-secondary)]
                               focus:ring-2
                               focus:ring-[color:var(--color-primary)]
                               focus:outline-none">
                </div>

                {{-- SUBMIT --}}
                <button type="submit"
                    class="mt-6 cursor-pointer
                           inline-flex items-center justify-center gap-2
                           rounded-xl
                           bg-[color:var(--color-secondary)]
                           px-4 py-2.5
                           text-sm font-medium text-white
                           shadow-sm
                           transition-all duration-200
                           hover:shadow-md
                           hover:brightness-110
                           active:scale-95
                           focus-visible:outline-none
                           focus-visible:ring-2
                           focus-visible:ring-[color:var(--color-primary)]
                           focus-visible:ring-offset-2">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span>Ingresar</span>
                </button>

            </form>

        </div>
    </div>

</body>

</html>
