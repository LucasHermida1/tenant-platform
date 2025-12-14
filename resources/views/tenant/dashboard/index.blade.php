@extends('tenant.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col gap-6">

        {{-- HERO / CONTEXTO --}}
        <div
            class="relative overflow-hidden
                   rounded-3xl
                   bg-white/80 dark:bg-gray-900/80
                   bg-white dark:bg-gray-900
                   border border-gray-200 dark:border-gray-800
                   shadow-sm p-8">

            {{-- Subtle background accent --}}
            <div class="pointer-events-none absolute inset-0">
                <div
                    class="absolute -top-24 -right-24
                           h-72 w-72">
                </div>
            </div>

            <div class="relative">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-100">
                    Dashboard
                </h1>

                <p class="mt-1 text-gray-600 dark:text-gray-400">
                    Bienvenido al panel de
                    <span class="font-medium text-gray-900 dark:text-gray-100">
                        {{ $tenantSettings->brand_name ?? $tenant->name }}
                    </span>
                </p>

                @if (!empty($tenantSettings?->slogan))
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        {{ $tenantSettings->slogan }}
                    </p>
                @endif

                {{-- CONTEXT CHIPS --}}
                <div class="mt-5 flex flex-wrap gap-2 text-sm">

                    <span
                        class="inline-flex items-center gap-2
                               rounded-full
                               bg-gray-100 dark:bg-gray-800
                               px-3 py-1
                               text-gray-700 dark:text-gray-300">
                        <i class="fa-solid fa-database text-xs opacity-70"></i>
                        <span>
                            DB:
                            <span class="font-medium">{{ $tenant->database }}</span>
                        </span>
                    </span>

                    <span
                        class="inline-flex items-center gap-2
                               rounded-full
                               bg-gray-100 dark:bg-gray-800
                               px-3 py-1
                               text-gray-700 dark:text-gray-300">
                        <i class="fa-solid fa-user text-xs opacity-70"></i>
                        <span class="truncate max-w-[220px]">
                            {{ auth()->user()->email }}
                        </span>
                    </span>

                </div>
            </div>
        </div>

        {{-- FEATURE PREVIEWS / STATS --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            {{-- CARD BASE --}}
            @php
                $cardBase = '
                    group rounded-2xl
                    bg-white/70 dark:bg-gray-900/70
                    bg-white dark:bg-gray-900
                    border border-gray-200 dark:border-gray-800
                    shadow-sm p-6
                    transition-all duration-200
                    hover:shadow-md hover:-translate-y-0.5
                ';
            @endphp

            {{-- ACADEMIAS --}}
            <div class="{{ $cardBase }}">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Academias
                    </p>
                    <i class="fa-solid fa-school text-gray-300 dark:text-gray-600 group-hover:text-gray-400"></i>
                </div>

                <p class="mt-4 text-4xl font-bold tracking-tight text-gray-900 dark:text-gray-100">
                    —
                </p>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Próximamente: listado y alta
                </p>
            </div>

            {{-- ALUMNOS --}}
            <div class="{{ $cardBase }}">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Alumnos
                    </p>
                    <i class="fa-solid fa-users text-gray-300 dark:text-gray-600 group-hover:text-gray-400"></i>
                </div>

                <p class="mt-4 text-4xl font-bold tracking-tight text-gray-900 dark:text-gray-100">
                    —
                </p>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Próximamente: gestión y fichas
                </p>
            </div>

            {{-- EVENTOS --}}
            <div class="{{ $cardBase }}">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Eventos
                    </p>
                    <i class="fa-solid fa-calendar-days text-gray-300 dark:text-gray-600 group-hover:text-gray-400"></i>
                </div>

                <p class="mt-4 text-4xl font-bold tracking-tight text-gray-900 dark:text-gray-100">
                    —
                </p>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Próximamente: calendario
                </p>
            </div>

        </div>
    </div>
@endsection
