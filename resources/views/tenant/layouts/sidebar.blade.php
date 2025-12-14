<aside
    class="hidden lg:flex w-64 shrink-0
           border-r border-gray-200 dark:border-gray-800
           bg-white dark:bg-gray-900/70
           dark:backdrop-blur-md">

    <nav class="flex flex-col w-full px-3 py-4 gap-1">

        {{-- SECTION PRINCIPAL--}}
        <p class="px-3 mb-2 text-[11px] uppercase tracking-wider text-gray-400 dark:text-gray-300">
            Principal
        </p>

        <x-sidebar-item route="tenant.dashboard" label="Dashboard">
            <i class="fa-solid fa-house text-sm"></i>
        </x-sidebar-item>

        {{-- SECTION GESTION --}}
        <p class="px-3 mt-6 mb-2 text-[11px] uppercase tracking-wider text-gray-400 dark:text-gray-300">
            Gestión
        </p>

        <x-sidebar-item route="tenant.students.index" label="Alumnos">
            <i class="fa-solid fa-users text-sm"></i>
        </x-sidebar-item>

        <x-sidebar-item route="tenant.modules.index" label="Módulos">
            <i class="fa-solid fa-layer-group text-sm"></i>
        </x-sidebar-item>

        <x-sidebar-item route="tenant.events.index" label="Eventos">
            <i class="fa-solid fa-calendar-days text-sm"></i>
        </x-sidebar-item>

        {{-- SECTION CONFIGURACION --}}
        <p class="px-3 mt-6 mb-2 text-[11px] uppercase tracking-wider text-gray-400 dark:text-gray-300">
            Configuración
        </p>

        <x-sidebar-item route="tenant.settings.appearance" label="Apariencia">
            <i class="fa-solid fa-palette text-sm"></i>
        </x-sidebar-item>

        <x-sidebar-item route="tenant.settings.security" label="Seguridad">
            <i class="fa-solid fa-shield-halved text-sm"></i>
        </x-sidebar-item>

        <x-sidebar-item route="tenant.settings.profile" label="Perfil">
            <i class="fa-solid fa-user-gear text-sm"></i>
        </x-sidebar-item>

        <div class="flex-1"></div>

        <div class="px-3 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 text-xs text-gray-500 dark:text-gray-400">

            <p class="font-medium text-gray-700 dark:text-gray-200">
                {{ $tenant->name }}
            </p>

            <p class="truncate">
                Panel administrativo
            </p>
        </div>

    </nav>
</aside>
