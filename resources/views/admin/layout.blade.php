<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle ?? 'Panel' }} · {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen flex-col bg-gris/40 text-azul-900 antialiased">
    {{-- Barra superior del panel --}}
    <header class="sticky top-0 z-50 border-b border-azul-900/10 bg-azul-950 text-blanco">
        <div class="mx-auto flex h-16 max-w-6xl items-center justify-between gap-4 px-4 sm:px-6">
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <span
                        class="grid h-9 w-9 place-items-center rounded-full bg-ambar font-display text-lg font-bold text-azul-950">
                        {{ mb_substr(config('site.brand.name'), 0, 1) }}
                    </span>
                    <span class="font-display text-lg font-bold">{{ config('site.brand.name') }}</span>
                </a>
                <span
                    class="hidden rounded-full bg-ambar/20 px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-ambar sm:inline">
                    Panel admin
                </span>
            </div>

            <div class="flex items-center gap-1">
                <a href="{{ route('admin.dashboard') }}"
                    @class([
                        'rounded-full px-4 py-2 text-sm font-medium transition',
                        'bg-blanco/10 text-blanco' => request()->routeIs('admin.dashboard'),
                        'text-blanco/70 hover:bg-blanco/5 hover:text-blanco' => !request()->routeIs('admin.dashboard'),
                    ])>
                    Inicio
                </a>
                <a href="{{ route('admin.settings.edit') }}"
                    @class([
                        'rounded-full px-4 py-2 text-sm font-medium transition',
                        'bg-blanco/10 text-blanco' => request()->routeIs('admin.settings.*'),
                        'text-blanco/70 hover:bg-blanco/5 hover:text-blanco' => !request()->routeIs('admin.settings.*'),
                    ])>
                    Contenido
                </a>
                <a href="{{ route('admin.products.index') }}"
                    @class([
                        'rounded-full px-4 py-2 text-sm font-medium transition',
                        'bg-blanco/10 text-blanco' => request()->routeIs('admin.products.*'),
                        'text-blanco/70 hover:bg-blanco/5 hover:text-blanco' => !request()->routeIs('admin.products.*'),
                    ])>
                    Servicios
                </a>
                <a href="{{ route('admin.profile.edit') }}"
                    @class([
                        'rounded-full px-4 py-2 text-sm font-medium transition',
                        'bg-blanco/10 text-blanco' => request()->routeIs('admin.profile.*'),
                        'text-blanco/70 hover:bg-blanco/5 hover:text-blanco' => !request()->routeIs('admin.profile.*'),
                    ])>
                    Mi perfil
                </a>

                <form method="POST" action="{{ route('admin.logout') }}" class="ml-2">
                    @csrf
                    <button type="submit"
                        class="rounded-full border border-blanco/20 px-4 py-2 text-sm font-semibold text-blanco/80 transition hover:border-blanco/40 hover:bg-blanco/10 hover:text-blanco">
                        Salir
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-10 sm:px-6">
        @yield('content')
    </main>

    <footer class="border-t border-azul-900/10 bg-blanco">
        <div class="mx-auto max-w-6xl px-4 py-6 text-xs text-azul-700/60 sm:px-6">
            &copy; {{ now()->year }} {{ config('app.name') }} · Panel de administración
        </div>
    </footer>
</body>

</html>
