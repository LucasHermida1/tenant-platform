@extends('layouts.app')

@section('title', 'Seleccionar Federación')

@section('content')
    <div class="min-h-screen
               flex items-center justify-center
               px-6 py-12">

        <div class="w-full max-w-6xl">

            {{-- HEADER --}}
            <div class="mb-12 text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900">
                    Seleccioná tu federación
                </h1>

                <p class="mt-2 text-gray-600 max-w-xl mx-auto">
                    Elegí la organización a la que querés ingresar para continuar al panel.
                </p>
            </div>

            {{-- GRID --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($tenants as $tenant)
                    <a href="{{ route('tenant.login', ['tenant' => $tenant->slug]) }}"
                        class="group relative
                               rounded-3xl
                               bg-white/80 backdrop-blur-md
                               border border-gray-200
                               p-6
                               shadow-sm
                               transition-all duration-300
                               hover:-translate-y-1
                               hover:shadow-xl
                               hover:border-gray-900">

                        {{-- subtle background accent --}}
                        <div class="pointer-events-none absolute inset-0">
                            <div
                                class="absolute -top-20 -right-20
                                       h-56 w-56
                                       rounded-full
                                       bg-gray-100
                                       blur-3xl
                                       opacity-70
                                       transition-opacity duration-300
                                       group-hover:opacity-100">
                            </div>
                        </div>

                        <div class="relative flex flex-col h-full items-center text-center">

                            {{-- LOGO --}}
                            <div class="mb-5">
                                @if (!empty($tenant->logo_path))
                                    <img src="{{ asset($tenant->logo_path) }}" alt="Logo {{ $tenant->name }}"
                                        class="h-14 w-14 rounded-2xl object-contain bg-white shadow-md">
                                @else
                                    <div
                                        class="h-14 w-14
                                        rounded-2xl
                                        flex items-center justify-center
                                        bg-gradient-to-br from-gray-900 to-gray-700
                                        text-white
                                        shadow-md
                                        transition-transform duration-300
                                        group-hover:scale-105">
                                        <i class="fa-solid fa-landmark"></i>
                                    </div>
                                @endif
                            </div>

                            {{-- TEXT --}}
                            <div class="flex-1">
                                <h2
                                    class="text-xl font-semibold text-gray-900
                                           tracking-tight">
                                    {{ $tenant->name }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-500">
                                    Panel administrativo
                                </p>
                            </div>

                            {{-- CTA --}}
                            <div
                                class="mt-6 inline-flex items-center gap-2
                                       text-sm font-medium text-gray-700
                                       transition-colors duration-200
                                       group-hover:text-gray-900">
                                <span>Ingresar</span>
                                <i
                                    class="fa-solid fa-arrow-right
                                           text-xs
                                           transition-transform duration-200
                                           group-hover:translate-x-1">
                                </i>
                            </div>

                        </div>
                    </a>
                @endforeach

            </div>

            {{-- FOOTER --}}
            <p class="mt-14 text-center text-xs text-gray-400">
                © {{ date('Y') }} Plataforma Multi-Tenant
            </p>

        </div>
    </div>
@endsection
