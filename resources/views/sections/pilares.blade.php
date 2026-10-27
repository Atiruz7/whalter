<section id="pilares" class="relative isolate bg-gris/30 py-20 sm:py-28">
    <div class="mx-auto max-w-6xl px-4 sm:px-6">
        <div class="mx-auto max-w-3xl text-center">
            <div class="inline-flex items-center gap-2 rounded-full bg-azul-900/5 px-3.5 py-1 text-xs font-bold uppercase tracking-[0.2em] text-azul-700 ring-1 ring-azul-900/10">
                <span class="h-1.5 w-1.5 rounded-full bg-ambar"></span>
                6. Pilares de Contenido
            </div>
            <h2 class="mt-4 font-display text-3xl font-bold tracking-tight text-azul-900 sm:text-4xl lg:text-5xl">
                Cinco pilares de desarrollo integral
            </h2>
            <p class="mt-4 text-base text-azul-700/80 sm:text-lg">
                Áreas estratégicas donde compartimos contenido de alto valor, herramientas prácticas y experiencias transformadoras.
            </p>
        </div>

        @php
            $pilares = [
                [
                    'num' => '01',
                    'title' => 'Bienes Raíces',
                    'desc' => 'Compartir oportunidades, educación inmobiliaria, consejos para compradores e inversionistas y experiencias del sector.',
                    'image' => 'images/pilares/bienes-raices.jpg',
                    'badge' => 'Inversión & Educación',
                ],
                [
                    'num' => '02',
                    'title' => 'Motivación',
                    'desc' => 'Transmitir mensajes que impulsen a las personas a creer en sí mismas y actuar frente a sus metas.',
                    'image' => 'images/pilares/motivacion.jpg',
                    'badge' => 'Inspiración & Acción',
                ],
                [
                    'num' => '03',
                    'title' => 'Crecimiento Personal',
                    'desc' => 'Promover hábitos, disciplina, mentalidad, organización y aprendizaje continuo.',
                    'image' => 'images/pilares/crecimiento-personal.jpg',
                    'badge' => 'Hábitos & Mentalidad',
                ],
                [
                    'num' => '04',
                    'title' => 'Emprendimiento',
                    'desc' => 'Motivar a crear proyectos, identificar oportunidades y desarrollar una mentalidad emprendedora.',
                    'image' => 'images/pilares/emprendimiento.jpg',
                    'badge' => 'Proyectos & Visión',
                ],
                [
                    'num' => '05',
                    'title' => 'Deporte y Vida Activa',
                    'desc' => 'Promover la actividad física, la disciplina y los hábitos saludables como parte del desarrollo integral.',
                    'image' => 'images/pilares/deporte.jpg',
                    'badge' => 'Salud & Disciplina',
                ],
            ];
        @endphp

        <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($pilares as $index => $pilar)
                <article @class([
                    'group flex flex-col overflow-hidden rounded-3xl border border-azul-900/10 bg-white shadow-sm transition hover:-translate-y-1 hover:border-ambar/40 hover:shadow-xl',
                    'sm:col-span-2 lg:col-span-1' => $index === 4,
                ])>
                    <div class="relative h-52 w-full overflow-hidden bg-azul-900/10">
                        @if (file_exists(public_path($pilar['image'])))
                            <img src="{{ asset($pilar['image']) }}" alt="Pilar de contenido: {{ $pilar['title'] }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                loading="lazy">
                        @else
                            <div class="grid h-full w-full place-items-center bg-gradient-to-br from-azul-900 to-azul-700 text-blanco">
                                <span class="font-display text-lg font-bold">{{ $pilar['title'] }}</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-azul-950/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-3 left-4 right-4 flex items-center justify-between">
                            <span class="rounded-full bg-azul-950/80 px-3 py-1 text-[11px] font-semibold text-ambar backdrop-blur">
                                {{ $pilar['badge'] }}
                            </span>
                            <span class="font-display text-xl font-bold text-blanco/90">
                                {{ $pilar['num'] }}
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-1 flex-col p-6">
                        <h3 class="font-display text-2xl font-bold text-azul-900">
                            {{ $pilar['title'] }}
                        </h3>
                        <p class="mt-3 flex-1 text-sm leading-relaxed text-azul-700/85">
                            {{ $pilar['desc'] }}
                        </p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
