@php
    // Solo se pintan los botones que tienen texto Y url (como exige el enunciado).
    $heroButtons = array_values(array_filter(config('site.hero.buttons', []), function ($button) {
        return !empty($button['text']) && !empty($button['url']);
    }));
    $heroImage = config('site.hero.image');
@endphp

<section id="inicio" class="relative isolate overflow-hidden bg-azul-900 text-blanco">
    {{-- Imagen de fondo dinámica (modificable desde el panel). Si no existe, degradado de la paleta. --}}
    @if ($heroImage && file_exists(public_path($heroImage)))
        <img src="{{ asset($heroImage) }}" alt="Hero {{ config('site.brand.name') }}"
            class="absolute inset-0 -z-10 h-full w-full object-cover object-center">
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-azul-950/95 via-azul-950/80 to-azul-950/60"></div>
    @else
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-azul-950 via-azul-900 to-azul-700"></div>
    @endif

    {{-- Detalles decorativos --}}
    <div class="absolute -right-24 -top-24 -z-10 h-72 w-72 rounded-full bg-ambar/20 blur-3xl"></div>
    <div class="absolute -bottom-32 -left-20 -z-10 h-80 w-80 rounded-full bg-azul-500/30 blur-3xl"></div>

    <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6 sm:py-28 lg:py-32">
        {{-- Encabezado de Marca Personal con Identidad de WALTHER --}}
        <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-ambar/30 bg-ambar/10 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.2em] text-ambar backdrop-blur">
            <span class="h-1.5 w-1.5 rounded-full bg-ambar animate-pulse"></span>
            Marca Personal
        </div>

        <p class="font-display text-2xl font-bold tracking-tight text-blanco sm:text-3xl lg:text-4xl">
            Walther Qquesuallpa Yucra
        </p>

        <p class="mt-2 max-w-2xl text-xs font-semibold uppercase tracking-wider text-ambar/90 sm:text-sm">
            Bienes Raíces <span class="text-blanco/40">•</span> Motivación <span class="text-blanco/40">•</span> Crecimiento Personal <span class="text-blanco/40">•</span> Emprendimiento <span class="text-blanco/40">•</span> Deporte
        </p>

        {{-- Título y descripción dinámicos (editables desde el panel administrativo) --}}
        @if (!empty(config('site.hero.title')))
            <h1 class="mt-8 max-w-3xl font-display text-3xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl">
                {{ config('site.hero.title') }}
            </h1>
        @endif

        @if (!empty(config('site.hero.description')))
            <p class="mt-6 max-w-2xl text-lg leading-relaxed text-blanco/80 sm:text-xl">
                {{ config('site.hero.description') }}
            </p>
        @endif

        {{-- Botones configurables: si ninguno tiene datos válidos, el bloque no se muestra --}}
        @if (count($heroButtons) > 0)
            <div class="mt-10 flex flex-wrap gap-3">
                @foreach ($heroButtons as $index => $button)
                    <a href="{{ $button['url'] }}"
                        @class([
                            'rounded-full px-6 py-3.5 text-sm font-semibold transition',
                            'bg-ambar text-azul-950 shadow-lg shadow-ambar/20 hover:bg-ambar-oscuro' => $index === 0,
                            'border border-blanco/30 text-blanco hover:bg-blanco/10' => $index !== 0,
                        ])>
                        {{ $button['text'] }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
