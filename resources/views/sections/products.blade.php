@php
    $products = $products ?? collect();
@endphp

{{-- La sección solo se pinta si hay al menos un servicio activo (requisito del PDF). --}}
@if ($products->isNotEmpty())
    <section id="servicios" class="bg-gris/40 py-20 sm:py-24">
        <div class="mx-auto max-w-6xl px-4 sm:px-6">
            <div class="flex flex-wrap items-end justify-between gap-6">
                <div class="max-w-2xl">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-azul-500">Lo que ofrezco</p>
                    <h2 class="mt-3 font-display text-3xl font-bold tracking-tight sm:text-4xl">
                        Productos y servicios
                    </h2>
                    <p class="mt-4 text-azul-700/80">
                        Acompañamiento real en bienes raíces, crecimiento personal y emprendimiento.
                    </p>
                </div>

                {{-- Flechas del carrusel (solo en pantallas medianas en adelante) --}}
                <div class="hidden items-center gap-2 sm:flex">
                    <button type="button" data-carousel-prev aria-label="Anterior"
                        class="grid h-11 w-11 place-items-center rounded-full border border-azul-900/20 bg-white text-azul-900 transition hover:bg-azul-900 hover:text-blanco">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </button>
                    <button type="button" data-carousel-next aria-label="Siguiente"
                        class="grid h-11 w-11 place-items-center rounded-full border border-azul-900/20 bg-white text-azul-900 transition hover:bg-azul-900 hover:text-blanco">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Carrusel: desplazamiento horizontal con snap; en móvil se desliza con el dedo --}}
            <div data-carousel
                class="no-scrollbar mt-12 flex snap-x snap-mandatory gap-5 overflow-x-auto pb-4">
                @foreach ($products as $product)
                    <article
                        class="w-[80vw] max-w-xs shrink-0 snap-start rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm sm:w-72">
                        @if ($product->image_path)
                            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}"
                                class="mb-5 h-40 w-full rounded-xl object-cover">
                        @else
                            <div
                                class="mb-5 grid h-40 w-full place-items-center rounded-xl bg-azul-900/5 text-azul-700">
                                <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 2 2 7l10 5 10-5-10-5z"></path>
                                    <path d="m2 17 10 5 10-5M2 12l10 5 10-5"></path>
                                </svg>
                            </div>
                        @endif

                        <h3 class="font-display text-lg font-bold">{{ $product->name }}</h3>

                        @if ($product->description)
                            <p class="mt-2 text-sm leading-relaxed text-azul-700/80">
                                {{ $product->description }}
                            </p>
                        @endif

                        @if ($product->price)
                            <p class="mt-4 inline-block rounded-full bg-ambar/15 px-3 py-1 text-xs font-bold text-azul-900">
                                {{ $product->price }}
                            </p>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var track = document.querySelector('[data-carousel]');
            if (!track) return;

            var prev = document.querySelector('[data-carousel-prev]');
            var next = document.querySelector('[data-carousel-next]');
            var step = 300;

            if (prev) prev.addEventListener('click', function () {
                track.scrollBy({ left: -step, behavior: 'smooth' });
            });
            if (next) next.addEventListener('click', function () {
                track.scrollBy({ left: step, behavior: 'smooth' });
            });
        });
    </script>
@endif
