<header
    class="sticky top-0 z-50
           border-b border-gray-300 dark:border-gray-800
           bg-white dark:bg-gray-900">

    <div
        class="mx-auto max-w-7xl
               h-16
               px-4 sm:px-6 lg:px-8
               flex items-center justify-between">

        {{-- LEFT / BRAND --}}
        <div class="flex items-center gap-3 group select-none">

            {{-- LOGO --}}
            @if (!empty($tenantSettings?->logo_path))
                <img src="{{ asset($tenantSettings->logo_path) }}"
                    alt="Logo {{ $tenantSettings->brand_name ?? $tenant->name }}"
                    class="h-9 w-9
                           rounded-xl
                           object-contain
                           bg-white
                           shadow-sm
                           transition-all duration-300 ease-out
                           group-hover:scale-[1.06]
                           group-hover:shadow-md" />
            @else
                <div
                    class="h-9 w-9 rounded-xl
                           bg-white
                           shadow-sm
                           transition-all duration-300 ease-out
                           group-hover:scale-[1.06]
                           group-hover:shadow-md">
                </div>
            @endif

            {{-- BRAND TEXT --}}
            <div class="leading-tight">
                <p
                    class="text-[11px] uppercase tracking-wider
                           text-gray-600 dark:text-gray-400">
                    {{ $tenantSettings->brand_name ?? $tenant->name }}
                </p>

                <p class="text-xs text-gray-500 dark:text-gray-500">
                    {{ $tenantSettings->slogan ?? 'Panel administrativo' }}
                </p>
            </div>
        </div>

        {{-- RIGHT / USER --}}
        <div class="flex items-center gap-4">

            {{-- USER --}}
            <div
                class="hidden sm:flex items-center gap-2
                       text-sm text-gray-700 dark:text-gray-300">

                {{-- STATUS DOT --}}
                <span class="relative flex h-2.5 w-2.5">
                    <span
                        class="absolute inline-flex h-full w-full
                               rounded-full bg-emerald-500
                               opacity-75 animate-ping">
                    </span>
                    <span
                        class="relative inline-flex h-2.5 w-2.5
                               rounded-full bg-emerald-500">
                    </span>
                </span>

                <span class="max-w-[180px] truncate">
                    {{ auth()->user()->name ?? auth()->user()->email }}
                </span>
            </div>

            {{-- LOGOUT --}}
            <form method="POST" action="{{ route('tenant.logout', ['tenant' => $tenant->slug]) }}">
                @csrf

                <button type="submit"
                    class="group inline-flex items-center gap-2 cursor-pointer
                           rounded-xl
                           border border-gray-300 dark:border-gray-700
                           bg-white dark:bg-gray-800
                           px-3 py-2
                           text-sm font-medium
                           text-gray-700 dark:text-gray-200
                           shadow-sm
                           transition-all duration-200 ease-out
                           hover:bg-[color:var(--color-secondary)]
                           hover:text-white
                           hover:border-[color:var(--color-secondary)]
                           hover:shadow-md
                           active:scale-95
                           focus-visible:outline-none
                           focus-visible:ring-2
                           focus-visible:ring-[color:var(--color-primary)]
                           focus-visible:ring-offset-2
                           dark:focus-visible:ring-offset-gray-900">

                    <span>Salir</span>

                    <i
                        class="fa-solid fa-right-from-bracket
                               text-sm
                               opacity-60
                               transition-all duration-200
                               group-hover:translate-x-0.5
                               group-hover:opacity-100">
                    </i>
                </button>
            </form>

        </div>
    </div>
</header>
