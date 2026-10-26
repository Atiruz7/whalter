@extends('admin.layout')

@section('content')
    <div class="mb-8">
        <h1 class="font-display text-3xl font-bold">Nuevo servicio</h1>
        <p class="mt-2 text-sm text-azul-700/80">
            Completa los datos y aparecerá en el carrusel de la web.
        </p>
    </div>

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
        class="max-w-2xl space-y-6 rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm">
        @csrf

        @include('admin.products._form')

        <div class="flex items-center gap-3 border-t border-azul-900/10 pt-6">
            <button type="submit"
                class="rounded-full bg-ambar px-6 py-2.5 text-sm font-semibold text-azul-900 transition hover:bg-ambar-oscuro">
                Guardar servicio
            </button>
            <a href="{{ route('admin.products.index') }}"
                class="rounded-full border border-azul-900/20 px-6 py-2.5 text-sm font-semibold text-azul-700 transition hover:bg-azul-900/5">
                Cancelar
            </a>
        </div>
    </form>
@endsection
