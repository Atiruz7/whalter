@extends('admin.layout')

@section('content')
    <div class="mb-8">
        <h1 class="font-display text-3xl font-bold">Mi perfil</h1>
        <p class="mt-2 text-sm text-azul-700/80">
            Aquí puedes ver y actualizar tu información de administrador.
        </p>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-whatsapp/30 bg-whatsapp/10 px-4 py-3 text-sm font-medium text-azul-900">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid gap-8 lg:grid-cols-3">
        {{-- Tarjeta de información --}}
        <div class="rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm">
            <span class="grid h-16 w-16 place-items-center rounded-full bg-azul-900 font-display text-2xl font-bold text-blanco">
                {{ mb_substr($admin->name, 0, 1) }}
            </span>

            <h2 class="mt-4 font-display text-xl font-bold">{{ $admin->name }}</h2>
            <p class="text-sm text-azul-700/80">{{ $admin->email }}</p>

            <dl class="mt-6 space-y-3 border-t border-azul-900/10 pt-5 text-sm">
                <div class="flex justify-between">
                    <dt class="text-azul-700/70">Rol</dt>
                    <dd class="font-semibold">Administrador</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-azul-700/70">Usuario desde</dt>
                    <dd class="font-semibold">{{ $admin->created_at?->format('d/m/Y') }}</dd>
                </div>
            </dl>
        </div>

        {{-- Formulario de edición --}}
        <form method="POST" action="{{ route('admin.profile.update') }}"
            class="space-y-6 rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm lg:col-span-2">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <ul class="list-inside list-disc space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="name" class="mb-1.5 block text-sm font-semibold">Nombre *</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $admin->name) }}"
                        required maxlength="100"
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                </div>

                <div>
                    <label for="email" class="mb-1.5 block text-sm font-semibold">Correo electrónico *</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $admin->email) }}"
                        required maxlength="255" autocomplete="username"
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                </div>
            </div>

            <div class="border-t border-azul-900/10 pt-5">
                <h3 class="font-display text-lg font-bold">Cambiar contraseña</h3>
                <p class="mt-1 text-sm text-azul-700/70">
                    Déjalo vacío si no quieres cambiarla.
                </p>

                <div class="mt-4 grid gap-5 sm:grid-cols-3">
                    <div>
                        <label for="current_password" class="mb-1.5 block text-sm font-semibold">
                            Contraseña actual
                        </label>
                        <input id="current_password" type="password" name="current_password"
                            autocomplete="current-password"
                            class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                    </div>

                    <div>
                        <label for="password" class="mb-1.5 block text-sm font-semibold">Nueva contraseña</label>
                        <input id="password" type="password" name="password" autocomplete="new-password"
                            class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                    </div>

                    <div>
                        <label for="password_confirmation" class="mb-1.5 block text-sm font-semibold">
                            Confirmar contraseña
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            autocomplete="new-password"
                            class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                    </div>
                </div>
            </div>

            <button type="submit"
                class="rounded-full bg-azul-900 px-8 py-3.5 text-sm font-semibold text-blanco shadow-lg shadow-azul-900/20 transition hover:bg-azul-700">
                Guardar mis datos
            </button>
        </form>
    </div>
@endsection
