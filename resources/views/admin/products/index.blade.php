@extends('admin.layout')

@section('content')
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="font-display text-3xl font-bold">Servicios y productos</h1>
            <p class="mt-2 text-sm text-azul-700/80">
                Administra los elementos del carrusel público. Si la lista queda vacía, la sección desaparece de la web.
            </p>
        </div>

        <a href="{{ route('admin.products.create') }}"
            class="inline-flex items-center gap-2 rounded-full bg-ambar px-5 py-2.5 text-sm font-semibold text-azul-900 transition hover:bg-ambar-oscuro">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" aria-hidden="true">
                <path d="M12 5v14M5 12h14"></path>
            </svg>
            Nuevo servicio
        </a>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-whatsapp/30 bg-whatsapp/10 px-4 py-3 text-sm font-medium text-azul-900">
            {{ session('status') }}
        </div>
    @endif

    @if ($products->isEmpty())
        <div class="rounded-2xl border border-dashed border-azul-900/20 bg-white p-12 text-center">
            <p class="font-display text-lg font-bold">Aún no hay servicios registrados</p>
            <p class="mt-2 text-sm text-azul-700/80">
                Agrega el primero y aparecerá automáticamente en el carrusel de la web.
            </p>
            <a href="{{ route('admin.products.create') }}"
                class="mt-6 inline-flex rounded-full bg-ambar px-5 py-2.5 text-sm font-semibold text-azul-900 transition hover:bg-ambar-oscuro">
                Crear el primero
            </a>
        </div>
    @else
        <div class="overflow-hidden rounded-2xl border border-azul-900/10 bg-white shadow-sm">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-azul-900/10 bg-gris/50 text-xs font-semibold uppercase tracking-wider text-azul-500">
                    <tr>
                        <th class="px-5 py-3.5">Orden</th>
                        <th class="px-5 py-3.5">Nombre</th>
                        <th class="px-5 py-3.5 hidden sm:table-cell">Precio</th>
                        <th class="px-5 py-3.5">Estado</th>
                        <th class="px-5 py-3.5 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-azul-900/5">
                    @foreach ($products as $product)
                        <tr class="transition hover:bg-gris/30">
                            <td class="px-5 py-4 font-semibold text-azul-500">{{ $product->sort_order }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    @if ($product->image_path)
                                        <img src="{{ asset($product->image_path) }}" alt=""
                                            class="h-10 w-10 rounded-lg object-cover">
                                    @else
                                        <span
                                            class="grid h-10 w-10 place-items-center rounded-lg bg-azul-900/5 text-azul-700">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" aria-hidden="true">
                                                <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                <path d="m21 15-5-5L5 21"></path>
                                            </svg>
                                        </span>
                                    @endif
                                    <div>
                                        <p class="font-semibold">{{ $product->name }}</p>
                                        <p class="text-xs text-azul-700/60">
                                            {{ \Illuminate\Support\Str::limit($product->description, 60) ?: '—' }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 hidden sm:table-cell">{{ $product->price ?: '—' }}</td>
                            <td class="px-5 py-4">
                                @if ($product->is_active)
                                    <span
                                        class="rounded-full bg-whatsapp/15 px-2.5 py-1 text-xs font-semibold text-azul-900">
                                        Activo
                                    </span>
                                @else
                                    <span class="rounded-full bg-gris px-2.5 py-1 text-xs font-semibold text-azul-700">
                                        Oculto
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="rounded-full border border-azul-900/20 px-3.5 py-1.5 text-xs font-semibold text-azul-700 transition hover:border-azul-900/40 hover:bg-azul-900/5">
                                        Editar
                                    </a>
                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                        onsubmit="return confirm('¿Eliminar este servicio?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="rounded-full border border-red-200 px-3.5 py-1.5 text-xs font-semibold text-red-600 transition hover:bg-red-50">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
