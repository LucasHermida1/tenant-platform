@props(['route', 'label', 'disabled' => null])

@php
    $tenant = request()->route('tenant');
    $exists = \Illuminate\Support\Facades\Route::has($route);
    $isDisabled = $disabled ?? !$exists;
    $active = !$isDisabled && request()->routeIs($route);
@endphp

@if (!$isDisabled)
    <a href="{{ route($route, ['tenant' => $tenant->slug]) }}"
        class="group flex items-center gap-3
               rounded-xl px-3 py-2
               text-sm font-medium
               transition-all duration-200 ease-out
               {{ $active
                   ? 'bg-[color:var(--color-secondary)] text-white shadow-sm'
                   : 'text-gray-700 dark:text-gray-200
                                      hover:bg-[color:var(--color-secondary)]
                                      hover:text-white' }}">

        <span
            class="transition-opacity duration-200
                   {{ $active ? 'opacity-100' : 'opacity-80 dark:opacity-90 group-hover:opacity-100' }}">
            {{ $slot }}
        </span>

        <span class="truncate">
            {{ $label }}
        </span>
    </a>
@else
    <div class="flex items-center gap-3
               rounded-xl px-3 py-2
               text-sm font-medium
               text-gray-400 dark:text-gray-500
               cursor-not-allowed select-none opacity-70"
        title="Próximamente">

        <span class="opacity-60">
            {{ $slot }}
        </span>

        <span class="truncate">
            {{ $label }}
        </span>

        <span
            class="ml-auto
                   rounded-full
                   bg-gray-100 dark:bg-gray-800
                   px-2 py-0.5
                   text-[10px] uppercase tracking-wider
                   text-gray-500 dark:text-gray-300">
            Soon
        </span>
    </div>
@endif
