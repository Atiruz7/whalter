<section id="valores" class="relative isolate bg-blanco py-20 sm:py-28">
    <div class="pointer-events-none absolute right-0 top-1/4 -z-10 h-72 w-72 rounded-full bg-azul-500/5 blur-3xl"></div>
    <div class="pointer-events-none absolute left-0 bottom-10 -z-10 h-72 w-72 rounded-full bg-ambar/5 blur-3xl"></div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6">
        <div class="mx-auto max-w-3xl text-center">
            <div class="inline-flex items-center gap-2 rounded-full bg-azul-900/5 px-3.5 py-1 text-xs font-bold uppercase tracking-[0.2em] text-azul-700 ring-1 ring-azul-900/10">
                <span class="h-1.5 w-1.5 rounded-full bg-ambar"></span>
                5. Valores de WALTHER
            </div>
            <h2 class="mt-4 font-display text-3xl font-bold tracking-tight text-azul-900 sm:text-4xl lg:text-5xl">
                Principios que guían cada acción
            </h2>
            <p class="mt-4 text-base text-azul-700/80 sm:text-lg">
                Siete pilares éticos y de conducta para construir relaciones transparentes y resultados sólidos.
            </p>
        </div>

        @php
            $valores = [
                [
                    'name' => 'Disciplina',
                    'desc' => 'Mantener constancia y compromiso aun cuando existan dificultades.',
                    'icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>',
                ],
                [
                    'name' => 'Perseverancia',
                    'desc' => 'No rendirse ante los obstáculos y continuar trabajando por los objetivos.',
                    'icon' => '<path d="m8 3 4 8 5-5 5 15H2L8 3z"></path>',
                ],
                [
                    'name' => 'Responsabilidad',
                    'desc' => 'Actuar con seriedad, transparencia y compromiso.',
                    'icon' => '<path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect><path d="m9 14 2 2 4-4"></path>',
                ],
                [
                    'name' => 'Servicio',
                    'desc' => 'Buscar que el conocimiento y las oportunidades puedan beneficiar a otras personas.',
                    'icon' => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>',
                ],
                [
                    'name' => 'Integridad',
                    'desc' => 'Construir relaciones basadas en confianza, respeto y honestidad.',
                    'icon' => '<path d="M6 3h12l4 6-10 13L2 9Z"></path><path d="M11 3 8 9l4 13 4-13-3-6"></path><path d="M2 9h20"></path>',
                ],
                [
                    'name' => 'Fe y propósito',
                    'desc' => 'Mantener una dirección clara y actuar con esperanza y convicción.',
                    'icon' => '<path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>',
                ],
                [
                    'name' => 'Superación',
                    'desc' => 'Buscar continuamente aprender, mejorar y crecer.',
                    'icon' => '<path d="m22 7-8.5 8.5-5-5L2 17"></path><path d="M16 7h6v6"></path>',
                ],
            ];
        @endphp

        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($valores as $index => $valor)
                <div @class([
                    'group relative rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-ambar/40 hover:shadow-md',
                    'sm:col-span-2 lg:col-span-1 xl:col-span-1' => $index === 6,
                ])>
                    <div class="flex items-center gap-3">
                        <div class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-azul-900 text-ambar transition group-hover:bg-ambar group-hover:text-azul-950">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                {!! $valor['icon'] !!}
                            </svg>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-wider text-azul-500">Valor {{ $index + 1 }}</span>
                    </div>

                    <h3 class="mt-4 font-display text-xl font-bold text-azul-900">
                        {{ $valor['name'] }}
                    </h3>

                    <p class="mt-2 text-sm leading-relaxed text-azul-700/80">
                        {{ $valor['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
