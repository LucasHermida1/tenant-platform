@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div
        class="min-h-screen
               flex items-center justify-center
               px-6
               bg-gradient-to-br from-gray-50 via-white to-gray-100">

        <div class="w-full max-w-6xl">

            <div
                class="relative overflow-hidden
                       rounded-[2.5rem]
                       bg-white
                       border border-gray-200
                       shadow-xl
                       px-12 py-16">

                {{-- BACKGROUND DECOR --}}
                <div class="pointer-events-none absolute inset-0">
                    <div
                        class="absolute -top-40 -right-40
                               h-[32rem] w-[32rem]
                               rounded-full bg-gray-100 blur-3xl">
                    </div>
                    <div
                        class="absolute -bottom-40 -left-40
                               h-[32rem] w-[32rem]
                               rounded-full bg-gray-50 blur-3xl">
                    </div>
                </div>

                <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                    {{-- LEFT --}}
                    <div>
                        <span
                            class="inline-block mb-4
                                   rounded-full bg-gray-100
                                   px-4 py-1
                                   text-xs font-medium text-gray-600">
                            Plataforma Multi-Tenant · Lucas Hermida
                        </span>

                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 leading-tight">
                            Gestión centralizada de federaciones
                        </h1>

                        <p class="mt-5 text-gray-600 leading-relaxed max-w-xl">
                            Una plataforma diseñada para administrar organizaciones,
                            academias, instructores y alumnos desde una arquitectura
                            multi-tenant moderna, segura y escalable.
                        </p>

                        {{-- FEATURES --}}
                        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-600">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-building-columns text-gray-400"></i>
                                <span>Múltiples organizaciones</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-users text-gray-400"></i>
                                <span>Roles y permisos</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-database text-gray-400"></i>
                                <span>Bases de datos aisladas</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-shield-halved text-gray-400"></i>
                                <span>Seguridad por tenant</span>
                            </div>
                        </div>

                        {{-- CTA --}}
                        <div class="mt-10">
                            <a href="{{ route('federations.select') }}"
                                class="inline-flex items-center gap-2
                                      rounded-xl
                                      bg-gray-900
                                      px-7 py-3.5
                                      text-sm font-semibold text-white
                                      shadow-sm
                                      transition-all duration-200
                                      hover:bg-gray-800 hover:shadow-md
                                      active:scale-95
                                      focus-visible:outline-none
                                      focus-visible:ring-2 focus-visible:ring-gray-900
                                      focus-visible:ring-offset-2">
                                <span>Ingresar a la plataforma</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    {{-- RIGHT · VISUAL CONCEPTUAL --}}
                    <div class="hidden lg:block">
                        <div
                            class="relative rounded-2xl
                                   border border-gray-200
                                   bg-gray-50
                                   p-6
                                   shadow-inner">

                            <div class="space-y-4 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="font-medium text-gray-700">
                                        Panel administrativo
                                    </span>
                                    <span class="text-gray-400">
                                        —
                                    </span>
                                </div>

                                <div class="h-px bg-gray-200"></div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="rounded-xl bg-white p-4 border text-gray-600">
                                        Academias
                                    </div>
                                    <div class="rounded-xl bg-white p-4 border text-gray-600">
                                        Alumnos
                                    </div>
                                    <div class="rounded-xl bg-white p-4 border text-gray-600">
                                        Eventos
                                    </div>
                                    <div class="rounded-xl bg-white p-4 border text-gray-600">
                                        Usuarios
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                {{-- FOOTER --}}
                <p class="mt-16 text-center text-xs text-gray-400">
                    © {{ date('Y') }} Plataforma Multi-Tenant
                </p>

            </div>
        </div>
    </div>
@endsection
