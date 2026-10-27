<section id="compromiso" class="relative isolate overflow-hidden bg-gris/30 py-20 sm:py-28">
    <div class="pointer-events-none absolute -right-20 top-1/2 -z-10 h-72 w-72 -translate-y-1/2 rounded-full bg-ambar/10 blur-3xl"></div>

    <div class="mx-auto max-w-5xl px-4 sm:px-6">
        <div class="relative overflow-hidden rounded-3xl border border-azul-900/10 bg-white p-8 shadow-xl sm:p-12 lg:p-16">
            {{-- Detalle decorativo de acento --}}
            <div class="absolute -right-16 -top-16 h-40 w-40 rounded-full bg-ambar/10 blur-2xl"></div>

            <div class="mx-auto max-w-3xl text-center">
                <div class="inline-flex items-center gap-2 rounded-full bg-azul-900/5 px-3.5 py-1 text-xs font-bold uppercase tracking-[0.2em] text-azul-700 ring-1 ring-azul-900/10">
                    <span class="h-1.5 w-1.5 rounded-full bg-ambar"></span>
                    13. Compromiso con mi Audiencia
                </div>

                <h2 class="mt-4 font-display text-3xl font-bold tracking-tight text-azul-900 sm:text-4xl">
                    Un compromiso auténtico y cercano
                </h2>

                <blockquote class="mt-6 text-base leading-relaxed text-azul-900/90 sm:text-lg lg:text-xl">
                    &ldquo;Me comprometo a construir una marca auténtica, responsable y cercana, procurando que cada contenido tenga un propósito: <strong class="font-bold text-azul-950">informar, enseñar, motivar o generar una oportunidad</strong>. Quiero que cada persona que llegue a WALTHER pueda llevarse algo positivo que le ayude a dar un paso más en su camino.&rdquo;
                </blockquote>

                <div class="mt-6 flex items-center justify-center gap-2">
                    <span class="h-px w-12 bg-ambar/40"></span>
                    <span class="font-display text-sm font-bold text-azul-900">Walther Qquesuallpa Yucra</span>
                    <span class="h-px w-12 bg-ambar/40"></span>
                </div>

                {{-- Invitación cálida y botones de acción --}}
                <div class="mt-10 rounded-2xl border border-azul-900/10 bg-azul-900/5 p-6 text-center sm:p-8">
                    <p class="font-display text-lg font-bold text-azul-900 sm:text-xl">
                        ¿Listo para dar el siguiente paso en tu camino?
                    </p>
                    <p class="mt-2 text-sm text-azul-700/80 sm:text-base">
                        Te invito a conocer nuestras propuestas de valor y ponerte en contacto directamente.
                    </p>

                    <div class="mt-6 flex flex-wrap items-center justify-center gap-4">
                        @php
                            $hasActiveProducts = \App\Models\Product::active()->exists();
                        @endphp

                        @if ($hasActiveProducts)
                            <a href="#servicios"
                                class="inline-flex items-center gap-2 rounded-full bg-azul-900 px-6 py-3 text-sm font-semibold text-blanco shadow-md transition hover:bg-azul-950">
                                <svg class="h-4 w-4 text-ambar" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                Conocer los servicios
                            </a>
                        @endif

                        <a href="{{ !empty(config('site.contact.whatsapp_url')) ? config('site.contact.whatsapp_url') : '#contacto' }}"
                            @if (!empty(config('site.contact.whatsapp_url'))) target="_blank" rel="noopener noreferrer" @endif
                            class="inline-flex items-center gap-2 rounded-full border border-azul-900/20 bg-white px-6 py-3 text-sm font-semibold text-azul-900 shadow-sm transition hover:border-azul-900/40 hover:bg-azul-900/5">
                            <svg class="h-4 w-4 text-whatsapp" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.14-.14.3-.35.45-.53.15-.18.2-.3.3-.5.1-.2.05-.38-.02-.53-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.22 3.08.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2.01-1.41.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35z"></path>
                                <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.28-1.38a9.87 9.87 0 0 0 4.75 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2zm0 18.13h-.01a8.2 8.2 0 0 1-4.18-1.15l-.3-.18-3.12.82.83-3.05-.2-.31a8.19 8.19 0 0 1-1.26-4.35c0-4.54 3.7-8.23 8.24-8.23 2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.82c0 4.54-3.7 8.21-8.23 8.21z"></path>
                            </svg>
                            Ponerse en contacto
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
