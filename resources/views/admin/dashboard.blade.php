@extends('admin.layout')

@section('content')
    <div class="mb-8">
        <h1 class="font-display text-3xl font-bold">Hola, {{ $admin->name }}</h1>
        <p class="mt-2 text-sm text-azul-700/80">
            Desde aquí puedes configurar el contenido de la web y administrar tus datos.
        </p>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-whatsapp/30 bg-whatsapp/10 px-4 py-3 text-sm font-medium text-azul-900">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        {{-- Acceso al contenido del sitio --}}
        <a href="{{ route('admin.settings.edit') }}"
            class="group rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
            <span
                class="grid h-12 w-12 place-items-center rounded-xl bg-azul-900/5 text-azul-700 transition group-hover:bg-azul-900 group-hover:text-blanco">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 20h9"></path>
                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                </svg>
            </span>
            <h2 class="mt-4 font-display text-lg font-bold">Contenido de la web</h2>
            <p class="mt-1 text-sm text-azul-700/80">
                Banner, título, descripción, botones, sección café y datos de contacto.
            </p>
        </a>

        {{-- Acceso a servicios --}}
        <a href="{{ route('admin.products.index') }}"
            class="group rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
            <span
                class="grid h-12 w-12 place-items-center rounded-xl bg-azul-900/5 text-azul-700 transition group-hover:bg-azul-900 group-hover:text-blanco">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m12 2 10 6v8l-10 6L2 16V8l10-6z"></path>
                    <path d="M12 22V12M22 8l-10 4L2 8"></path>
                </svg>
            </span>
            <h2 class="mt-4 font-display text-lg font-bold">Servicios</h2>
            <p class="mt-1 text-sm text-azul-700/80">
                Administra los elementos del carrusel público.
            </p>
        </a>

        {{-- Acceso al perfil --}}
        <a href="{{ route('admin.profile.edit') }}"
            class="group rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
            <span
                class="grid h-12 w-12 place-items-center rounded-xl bg-azul-900/5 text-azul-700 transition group-hover:bg-azul-900 group-hover:text-blanco">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </span>
            <h2 class="mt-4 font-display text-lg font-bold">Mi perfil</h2>
            <p class="mt-1 text-sm text-azul-700/80">
                Nombre, correo electrónico y contraseña de este administrador.
            </p>
        </a>

    </div>

@endsection
