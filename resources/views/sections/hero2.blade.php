@php
    $hero2Background = config('site.hero2.background');
    $hero2Video = config('site.hero2.video');
    $hasVideo = !empty($hero2Video) && file_exists(public_path($hero2Video));
@endphp

<section class="relative isolate overflow-hidden">
    {{-- Fondo indicado por el enunciado: hero2-fondoBanner.jpg --}}
    @if ($hero2Background && file_exists(public_path($hero2Background)))
        <img src="{{ asset($hero2Background) }}" alt=""
            class="absolute inset-0 -z-10 h-full w-full object-cover object-center">
    @endif
    <div class="absolute inset-0 -z-10 bg-azul-950/75"></div>

    <div class="mx-auto grid max-w-6xl items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:py-28">
        {{-- Información textual + botón de WhatsApp --}}
        <div>
            @if (!empty(config('site.hero2.text')))
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-ambar">Agenda una reunión</p>
                <p class="mt-4 font-display text-4xl font-bold leading-tight text-blanco sm:text-5xl">
                    {{ config('site.hero2.text') }}
                </p>
            @endif

            {{-- Btn3: redirige a WhatsApp con mensaje personalizado pre-cargado --}}
            <a href="{{ config('site.contact.whatsapp_url') }}" target="_blank" rel="noopener noreferrer"
                class="mt-8 inline-flex items-center gap-2.5 rounded-full bg-whatsapp px-6 py-3.5 text-sm font-semibold text-azul-950 shadow-lg shadow-black/20 transition hover:brightness-110">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path
                        d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.14-.14.3-.35.45-.53.15-.18.2-.3.3-.5.1-.2.05-.38-.02-.53-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.22 3.08.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2.01-1.41.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35z">
                    </path>
                    <path
                        d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.28-1.38a9.87 9.87 0 0 0 4.75 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2zm0 18.13h-.01a8.2 8.2 0 0 1-4.18-1.15l-.3-.18-3.12.82.83-3.05-.2-.31a8.19 8.19 0 0 1-1.26-4.35c0-4.54 3.7-8.23 8.24-8.23 2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.82c0 4.54-3.7 8.21-8.23 8.21z">
                    </path>
                </svg>
                Agendar por WhatsApp
            </a>

            <p class="mt-4 text-sm text-blanco/60">
                &ldquo;{{ config('site.contact.whatsapp_message') }}&rdquo;
            </p>
        </div>

        {{-- Video de 5 a 10 segundos: si no existe archivo se muestra un respaldo visual --}}
        <div class="relative">
            @if ($hasVideo)
                <video src="{{ asset($hero2Video) }}" autoplay muted loop playsinline
                    class="aspect-video w-full rounded-2xl object-cover shadow-2xl ring-1 ring-blanco/10"></video>
                <span
                    class="absolute -bottom-3 left-6 rounded-full bg-ambar px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-azul-950 shadow-lg">
                    Nuestra propuesta
                </span>
            @else
                <div
                    class="grid aspect-video w-full place-items-center rounded-2xl bg-blanco/10 ring-1 ring-blanco/15 backdrop-blur">
                    <span class="px-6 text-center text-sm text-blanco/60">
                        Coloca un video de 5 a 10 segundos en
                        <code class="text-ambar">public/{{ config('site.hero2.video') ?? 'videos/' }}</code>
                    </span>
                </div>
            @endif
        </div>
    </div>
</section>
