<section id="objetivos" class="relative isolate bg-azul-950 py-20 text-blanco sm:py-28">
    <div class="pointer-events-none absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-azul-900/40 via-azul-950 to-azul-950"></div>
    <div class="pointer-events-none absolute left-10 bottom-10 -z-10 h-72 w-72 rounded-full bg-ambar/10 blur-3xl"></div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6">
        <div class="mx-auto max-w-3xl text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-ambar/30 bg-ambar/10 px-3.5 py-1 text-xs font-bold uppercase tracking-[0.2em] text-ambar">
                <span class="h-1.5 w-1.5 rounded-full bg-ambar"></span>
                9. Objetivos de la Marca
            </div>
            <h2 class="mt-4 font-display text-3xl font-bold tracking-tight text-blanco sm:text-4xl lg:text-5xl">
                Metas claras para avanzar juntos
            </h2>
            <p class="mt-4 text-base text-blanco/70 sm:text-lg">
                Siete objetivos prioritarios orientados a construir confianza, comunidad y valor tangible a largo plazo.
            </p>
        </div>

        @php
            $objetivos = [
                'Construir una comunidad sólida alrededor de la marca personal WALTHER.',
                'Llegar progresivamente a una audiencia amplia a nivel nacional e internacional.',
                'Posicionar a WALTHER como una marca confiable en bienes raíces, motivación y emprendimiento.',
                'Compartir contenido constante, útil, auténtico y cercano.',
                'Generar oportunidades de negocio y alianzas relacionadas con bienes raíces y emprendimiento.',
                'Motivar a más personas a practicar deporte y desarrollar disciplina.',
                'Inspirar a las personas a establecer metas y trabajar por ellas.',
            ];
        @endphp

        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($objetivos as $index => $objetivo)
                <div @class([
                    'flex items-start gap-4 rounded-2xl border border-blanco/10 bg-blanco/5 p-6 backdrop-blur transition hover:border-ambar/40 hover:bg-blanco/[0.08]',
                    'sm:col-span-2 lg:col-span-1' => $index === 6,
                ])>
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-ambar/15 font-display text-base font-bold text-ambar">
                        0{{ $index + 1 }}
                    </span>
                    <p class="text-sm leading-relaxed text-blanco/85 sm:text-base">
                        {{ $objetivo }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
