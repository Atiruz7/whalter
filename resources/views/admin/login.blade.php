@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-md px-4 py-24 sm:px-6">
        <div class="rounded-2xl border border-azul-900/10 bg-white p-8 shadow-sm">
            <div class="text-center">
                <span class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-azul-900/5 text-azul-700">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="11" width="18" height="11" rx="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </span>

                <h1 class="mt-6 font-display text-2xl font-bold text-azul-900">Área de administración</h1>
                <p class="mt-2 text-sm text-azul-700/80">Ingresa con tus credenciales de administrador.</p>
            </div>

            @if ($errors->any())
                <div class="mt-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.attempt') }}" class="mt-8 space-y-5">
                @csrf

                <div>
                    <label for="email" class="mb-1.5 block text-sm font-semibold text-azul-900">
                        Correo electrónico
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        autocomplete="username"
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm text-azul-900 placeholder:text-azul-700/40 focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                </div>

                <div>
                    <label for="password" class="mb-1.5 block text-sm font-semibold text-azul-900">
                        Contraseña
                    </label>
                    <input id="password" type="password" name="password" required
                        autocomplete="current-password"
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm text-azul-900 placeholder:text-azul-700/40 focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                </div>

                <label class="flex items-center gap-2 text-sm text-azul-700">
                    <input type="checkbox" name="remember" value="1"
                        class="h-4 w-4 rounded border-azul-900/30 text-azul-900 focus:ring-azul-500/30">
                    Recordarme
                </label>

                <button type="submit"
                    class="w-full rounded-full bg-azul-900 px-6 py-3 text-sm font-semibold text-blanco transition hover:bg-azul-700">
                    Ingresar
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-sm text-azul-700/70 transition hover:text-azul-900">
                    &larr; Volver al inicio
                </a>
            </div>
        </div>
    </div>
@endsection
