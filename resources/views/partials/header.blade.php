<header class="sticky top-0 z-50 border-b border-azul-900/10 bg-blanco/90 backdrop-blur">
    <div class="mx-auto flex h-16 max-w-6xl items-center justify-between gap-4 px-4 sm:px-6">
        {{-- Logo: texto corto configurable en config/site.php ('brand.name' / 'brand.logo_image') --}}
        <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2.5">
            @if (config('site.brand.logo_image'))
                <img src="{{ asset(config('site.brand.logo_image')) }}" alt="{{ config('site.brand.name') }}"
                    class="h-9 w-auto">
            @else
                <span
                    class="grid h-9 w-9 place-items-center rounded-full bg-azul-900 font-display text-lg font-bold text-blanco">
                    {{ mb_substr(config('site.brand.name'), 0, 1) }}
                </span>
                <span class="font-display text-xl font-bold tracking-tight text-azul-900">
                    {{ config('site.brand.name') }}
                </span>
            @endif
        </a>

        {{-- Atajos de navegación: no se pintan si la lista está vacía --}}
        @if (count(config('site.nav', [])) > 0)
            <nav class="hidden items-center gap-1 md:flex" aria-label="Navegación principal">
                @foreach (config('site.nav') as $link)
                    <a href="{{ $link['url'] }}"
                        class="rounded-full px-4 py-2 text-sm font-medium text-azul-700 transition hover:bg-azul-900/5 hover:text-azul-900">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>
        @endif

        <div class="flex items-center gap-2">
            {{-- Botón discreto de acceso al área del administrador --}}
            <a href="{{ route('admin.login') }}"
                class="hidden items-center gap-1.5 rounded-full border border-azul-900/20 px-3.5 py-1.5 text-xs font-semibold text-azul-700 transition hover:border-azul-900/40 hover:bg-azul-900/5 hover:text-azul-900 sm:inline-flex">
                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="11" width="18" height="11" rx="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                {{ config('site.admin.login_label') }}
            </a>

            <a href="{{ route('admin.login') }}" aria-label="Ingresar como administrador"
                class="grid h-9 w-9 place-items-center rounded-full border border-azul-900/20 text-azul-700 transition hover:bg-azul-900/5 sm:hidden">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="11" width="18" height="11" rx="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
            </a>

            <button id="menu-toggle" type="button" aria-label="Abrir menú" aria-expanded="false"
                aria-controls="menu-movil"
                class="grid h-9 w-9 place-items-center rounded-full border border-azul-900/20 text-azul-700 transition hover:bg-azul-900/5 md:hidden">
                <svg id="icon-open" class="h-4.5 w-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" aria-hidden="true">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="icon-close" class="hidden h-4.5 w-4.5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                    <path d="M6 6l12 12M18 6L6 18"></path>
                </svg>
            </button>
        </div>
    </div>

    {{-- Menú móvil --}}
    @if (count(config('site.nav', [])) > 0)
        <nav id="menu-movil" class="hidden border-t border-azul-900/10 md:hidden" aria-label="Navegación móvil">
            <div class="mx-auto flex max-w-6xl flex-col gap-1 px-4 py-3 sm:px-6">
                @foreach (config('site.nav') as $link)
                    <a href="{{ $link['url'] }}"
                        class="rounded-lg px-3 py-2.5 text-sm font-medium text-azul-700 transition hover:bg-azul-900/5 hover:text-azul-900">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </nav>
    @endif
</header>
