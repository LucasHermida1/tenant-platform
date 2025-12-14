@extends('tenant.layouts.app')

@section('title', 'Apariencia')

@section('content')
    <div class="mx-auto max-w-5xl">

        <div
            class="rounded-3xl
                   bg-white/70 dark:bg-gray-900/70
                   backdrop-blur
                   border border-gray-200 dark:border-gray-800
                   shadow-sm
                   p-8 space-y-8">

            {{-- HEADER --}}
            <div>
                <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-gray-100">
                    Apariencia
                </h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400 max-w-2xl">
                    Personalizá cómo se ve el sistema para vos. Estos cambios no afectan a otros usuarios.
                </p>
            </div>

            {{-- CARD: TEMA --}}
            <div class="rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 shadow-sm">
                <div class="p-6 flex items-center justify-between">
                    <div>
                        <h2 class="text-base font-medium text-gray-900 dark:text-gray-100">
                            Tema del sistema
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Elegí entre modo claro u oscuro.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('tenant.appearance.toggle-theme', $tenant->slug) }}">
                        @csrf
                        <button type="submit"
                            class="relative inline-flex h-7 w-12 items-center rounded-full cursor-pointer
                                   bg-gray-300 dark:bg-[color:var(--color-primary)]
                                   transition-colors duration-200
                                   hover:bg-gray-400 dark:hover:bg-[color:var(--color-secondary)]
                                   active:scale-95
                                   focus:outline-none focus:ring-2
                                   focus:ring-[color:var(--color-primary)]">
                            <span
                                class="inline-block h-5 w-5 transform rounded-full bg-white
                                       shadow-sm transition-all duration-200
                                       translate-x-1 dark:translate-x-6">
                            </span>
                        </button>
                    </form>
                </div>
            </div>

            {{-- CARD: DENSIDAD --}}
            <div class="rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 shadow-sm">
                <div class="p-6">
                    <h2 class="text-base font-medium text-gray-900 dark:text-gray-100">
                        Densidad de interfaz
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Ajustá el espaciado del contenido.
                    </p>

                    <div class="mt-4 flex gap-2">
                        <span
                            class="px-3 py-1 rounded-lg text-sm
                                     bg-gray-100 dark:bg-gray-800
                                     text-gray-700 dark:text-gray-300">
                            Compacta
                        </span>
                        <span
                            class="px-3 py-1 rounded-lg text-sm
                                     bg-gray-200 dark:bg-gray-700
                                     text-gray-800 dark:text-gray-100">
                            Normal
                        </span>
                        <span
                            class="px-3 py-1 rounded-lg text-sm
                                     bg-gray-100 dark:bg-gray-800
                                     text-gray-700 dark:text-gray-300">
                            Cómoda
                        </span>
                    </div>
                </div>
            </div>

            {{-- CARD: FUTURAS --}}
            <div
                class="rounded-2xl border border-dashed border-gray-300 dark:border-gray-700 bg-white/40 dark:bg-gray-900/40">
                <div class="p-6">
                    <h2 class="text-base font-medium text-gray-800 dark:text-gray-200">
                        Más opciones próximamente
                    </h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Idioma, accesibilidad y notificaciones estarán disponibles más adelante.
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection
