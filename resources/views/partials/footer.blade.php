<footer id="contacto" class="bg-azul-950 text-blanco">
    <div class="mx-auto grid max-w-6xl gap-10 px-4 py-14 sm:px-6 md:grid-cols-3">
        {{-- Marca --}}
        <div>
            <p class="font-display text-2xl font-bold">{{ config('site.brand.name') }}</p>
            <p class="mt-3 max-w-xs text-sm leading-relaxed text-blanco/70">
                {{ config('site.brand.tagline') }}
            </p>
        </div>

        {{-- Enlaces rápidos --}}
        @php
            $hasActiveProducts = \App\Models\Product::active()->exists();
            $footerNavLinks = array_filter(config('site.nav', []), function ($link) use ($hasActiveProducts) {
                return $link['url'] !== '#servicios' || $hasActiveProducts;
            });
        @endphp
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-ambar">Navegación</p>
            <ul class="mt-4 space-y-2.5 text-sm">
                @foreach ($footerNavLinks as $link)
                    <li>
                        <a href="{{ $link['url'] }}" class="text-blanco/70 transition hover:text-blanco">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
                <li>
                    <a href="{{ route('admin.login') }}" class="text-blanco/70 transition hover:text-blanco">
                        Área de administración
                    </a>
                </li>
            </ul>
        </div>

        {{-- Contacto y redes (datos configurables) --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-ambar">Contacto</p>
            <ul class="mt-4 space-y-3 text-sm">
                @if (!empty(config('site.contact.whatsapp_url')))
                    <li>
                        <a href="{{ config('site.contact.whatsapp_url') }}" target="_blank" rel="noopener noreferrer"
                            class="flex items-center gap-3 text-blanco/70 transition hover:text-blanco">
                            <span class="grid h-8 w-8 place-items-center rounded-full bg-whatsapp/15 text-whatsapp">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.14-.14.3-.35.45-.53.15-.18.2-.3.3-.5.1-.2.05-.38-.02-.53-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.22 3.08.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2.01-1.41.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35z">
                                    </path>
                                    <path
                                        d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.28-1.38a9.87 9.87 0 0 0 4.75 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2zm0 18.13h-.01a8.2 8.2 0 0 1-4.18-1.15l-.3-.18-3.12.82.83-3.05-.2-.31a8.19 8.19 0 0 1-1.26-4.35c0-4.54 3.7-8.23 8.24-8.23 2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.82c0 4.54-3.7 8.21-8.23 8.21z">
                                    </path>
                                </svg>
                            </span>
                            {{ config('site.contact.whatsapp_display') ?: 'WhatsApp' }}
                        </a>
                    </li>
                @endif
                @if (!empty(config('site.contact.facebook')))
                    <li>
                        <a href="{{ config('site.contact.facebook') }}" target="_blank" rel="noopener noreferrer"
                            class="flex items-center gap-3 text-blanco/70 transition hover:text-blanco">
                            <span class="grid h-8 w-8 place-items-center rounded-full bg-blanco/10">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5.02 3.66 9.18 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.52 1.49-3.91 3.77-3.91 1.09 0 2.24.2 2.24.2v2.47h-1.26c-1.24 0-1.63.78-1.63 1.57v1.89h2.78l-.44 2.91h-2.34V22c4.78-.76 8.44-4.92 8.44-9.94z">
                                    </path>
                                </svg>
                            </span>
                            Facebook
                        </a>
                    </li>
                @endif
                @if (!empty(config('site.contact.tiktok')))
                    <li>
                        <a href="{{ config('site.contact.tiktok') }}" target="_blank" rel="noopener noreferrer"
                            class="flex items-center gap-3 text-blanco/70 transition hover:text-blanco">
                            <span class="grid h-8 w-8 place-items-center rounded-full bg-blanco/10">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M16.6 5.82A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 1 1-2.59-2.59c.27 0 .53.04.78.12v-3.15a5.74 5.74 0 1 0 4.96 5.69V9.66a7.35 7.35 0 0 0 4.3 1.38V7.95a4.29 4.29 0 0 1-3.3-2.13z">
                                    </path>
                                </svg>
                            </span>
                            TikTok
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="border-t border-blanco/10">
        <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-2 px-4 py-6 text-xs text-blanco/50 sm:flex-row sm:px-6">
            <p>&copy; {{ now()->year }} {{ config('site.brand.name') }}. Todos los derechos reservados.</p>
            @if (config('site.credit.url'))
                <a href="{{ config('site.credit.url') }}" target="_blank" rel="noopener noreferrer"
                    class="transition hover:text-blanco">
                    {{ config('site.credit.text') }}
                </a>
            @else
                <p>{{ config('site.credit.text') }}</p>
            @endif
        </div>
    </div>
</footer>
