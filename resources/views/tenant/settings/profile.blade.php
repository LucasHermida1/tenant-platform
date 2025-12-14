@extends('tenant.layouts.app')

@section('title', 'Perfil')

@section('content')
    <div class="mx-auto max-w-5xl">

        <div
            class="rounded-3xl
                   bg-white dark:bg-gray-900
                   border border-gray-200 dark:border-gray-800
                   shadow-sm
                   p-8 space-y-8">

            {{-- HEADER --}}
            <div>
                <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-gray-100">
                    Perfil
                </h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400 max-w-2xl">
                    Información básica de tu cuenta y datos personales.
                </p>
            </div>

            {{-- CARD: INFORMACIÓN PERSONAL --}}
            <div class="rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 shadow-sm">
                <div class="p-6 space-y-6">

                    <h2 class="text-base font-medium text-gray-900 dark:text-gray-100">
                        Información personal
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">

                        <div>
                            <p class="text-gray-500 dark:text-gray-400">
                                Nombre
                            </p>
                            <p class="mt-1 font-medium text-gray-900 dark:text-gray-100">
                                {{ auth()->user()->name ?? '—' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 dark:text-gray-400">
                                Email
                            </p>
                            <p class="mt-1 font-medium text-gray-900 dark:text-gray-100 break-all">
                                {{ auth()->user()->email }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 dark:text-gray-400">
                                Rol
                            </p>
                            <p class="mt-1 font-medium text-gray-900 dark:text-gray-100">
                                {{ auth()->user()->role->name ?? '—' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 dark:text-gray-400">
                                Miembro desde
                            </p>
                            <p class="mt-1 font-medium text-gray-900 dark:text-gray-100">
                                {{ auth()->user()->created_at->format('d/m/Y') }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            {{-- CARD: ACCIONES --}}
            <div class="rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 shadow-sm">
                <div class="p-6 space-y-4">

                    <h2 class="text-base font-medium text-gray-900 dark:text-gray-100">
                        Acciones de cuenta
                    </h2>

                    <p class="text-sm text-gray-600 dark:text-gray-400 max-w-xl">
                        Opciones relacionadas con la seguridad y gestión de tu cuenta.
                    </p>

                    <div class="flex flex-wrap gap-3">

                        <button disabled
                            class="inline-flex items-center gap-2
                                   rounded-xl
                                   border border-gray-300 dark:border-gray-700
                                   bg-gray-100 dark:bg-gray-800
                                   px-4 py-2
                                   text-sm font-medium
                                   text-gray-400 dark:text-gray-500
                                   cursor-not-allowed">
                            <i class="fa-solid fa-key"></i>
                            Cambiar contraseña
                        </button>

                        <button disabled
                            class="inline-flex items-center gap-2
                                   rounded-xl
                                   border border-gray-300 dark:border-gray-700
                                   bg-gray-100 dark:bg-gray-800
                                   px-4 py-2
                                   text-sm font-medium
                                   text-gray-400 dark:text-gray-500
                                   cursor-not-allowed">
                            <i class="fa-solid fa-user-pen"></i>
                            Editar perfil
                        </button>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
