@extends('admin.layout')

@section('content')
    <div class="mb-8">
        <h1 class="font-display text-3xl font-bold">Contenido de la web</h1>
        <p class="mt-2 text-sm text-azul-700/80">
            Modifica el banner, la sección de café y los datos de contacto. Los cambios se aplican de
            inmediato al guardar.
        </p>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-whatsapp/30 bg-whatsapp/10 px-4 py-3 text-sm font-medium text-azul-900">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <p class="font-semibold">Revisa los siguientes campos:</p>
            <ul class="mt-1 list-inside list-disc space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- ===================== MARCA ===================== --}}
        <section class="rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm">
            <h2 class="font-display text-xl font-bold">Marca</h2>

            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="brand_name" class="mb-1.5 block text-sm font-semibold">Nombre del sitio *</label>
                    <input id="brand_name" type="text" name="brand_name"
                        value="{{ old('brand_name', $settings->brand_name) }}" required maxlength="100"
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                </div>

                <div>
                    <label for="tagline" class="mb-1.5 block text-sm font-semibold">Descripción corta</label>
                    <input id="tagline" type="text" name="tagline"
                        value="{{ old('tagline', $settings->tagline) }}" maxlength="255"
                        placeholder="Aparece en el footer"
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                </div>

                <div class="sm:col-span-2">
                    <label for="brand_logo" class="mb-1.5 block text-sm font-semibold">
                        Logo (imagen, opcional)
                    </label>

                    @if ($settings->brand_logo_path)
                        <div class="mb-3 flex items-center gap-4">
                            <img src="{{ asset($settings->brand_logo_path) }}" alt="Logo actual"
                                class="h-16 w-auto rounded-lg border border-azul-900/10 bg-blanco p-1 object-contain">
                            <label class="flex items-center gap-2 text-sm text-red-600">
                                <input type="checkbox" name="remove_brand_logo" value="1"
                                    class="h-4 w-4 rounded border-azul-900/30">
                                Quitar logo actual
                            </label>
                        </div>
                    @endif

                    <input id="brand_logo" type="file" name="brand_logo" accept="image/*"
                        class="block w-full text-sm text-azul-700 file:mr-4 file:rounded-full file:border-0 file:bg-azul-900/5 file:px-5 file:py-2.5 file:text-sm file:font-semibold file:text-azul-900 hover:file:bg-azul-900/10">
                </div>
            </div>
        </section>

        {{-- ===================== HERO ===================== --}}
        <section class="rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm">
            <h2 class="font-display text-xl font-bold">Banner principal (Hero)</h2>
            <p class="mt-1 text-sm text-azul-700/70">
                Si el título o la descripción se dejan vacíos, simplemente no se muestran en la web.
            </p>

            <div class="mt-5 grid gap-5">
                <div>
                    <label for="hero_image" class="mb-1.5 block text-sm font-semibold">
                        Imagen de fondo
                    </label>

                    @if ($settings->hero_image_path)
                        <div class="mb-3">
                            <img src="{{ asset($settings->hero_image_path) }}"
                                alt="Fondo actual del banner"
                                class="h-32 w-full rounded-xl border border-azul-900/10 object-cover">
                            <label class="mt-2 flex items-center gap-2 text-sm text-red-600">
                                <input type="checkbox" name="remove_hero_image" value="1"
                                    class="h-4 w-4 rounded border-azul-900/30">
                                Quitar imagen actual
                            </label>
                        </div>
                    @endif

                    <input id="hero_image" type="file" name="hero_image" accept="image/*"
                        class="block w-full text-sm text-azul-700 file:mr-4 file:rounded-full file:border-0 file:bg-azul-900/5 file:px-5 file:py-2.5 file:text-sm file:font-semibold file:text-azul-900 hover:file:bg-azul-900/10">
                    <p class="mt-1 text-xs text-azul-700/60">JPG, PNG o WebP · máximo 5 MB</p>
                </div>

                <div>
                    <label for="hero_title" class="mb-1.5 block text-sm font-semibold">Título (opcional)</label>
                    <input id="hero_title" type="text" name="hero_title"
                        value="{{ old('hero_title', $settings->hero_title) }}" maxlength="200"
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                </div>

                <div>
                    <label for="hero_description" class="mb-1.5 block text-sm font-semibold">Descripción (opcional)</label>
                    <textarea id="hero_description" name="hero_description" rows="3" maxlength="1000"
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">{{ old('hero_description', $settings->hero_description) }}</textarea>
                </div>

                {{-- Botones configurables --}}
                <div>
                    <p class="mb-2 text-sm font-semibold">Botones del banner</p>
                    <p class="mb-3 text-xs text-azul-700/60">
                        Un botón solo se muestra si tiene texto Y enlace. Déjalos vacíos para ocultarlos.
                    </p>

                    @php($currentButtons = old('hero_buttons', $settings->hero_buttons ?? []) ?: [])

                    <div class="grid gap-3 sm:grid-cols-2">
                        @for ($i = 0; $i < 2; $i++)
                            <div class="rounded-xl border border-azul-900/10 bg-gris/50 p-4">
                                <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-azul-500">
                                    Botón {{ $i + 1 }}
                                </p>
                                <input type="text" name="hero_buttons[{{ $i }}][text]"
                                    value="{{ $currentButtons[$i]['text'] ?? '' }}" placeholder="Texto visible"
                                    maxlength="60"
                                    class="mb-2 w-full rounded-lg border border-azul-900/20 bg-white px-3 py-2.5 text-sm focus:border-azul-500 focus:outline-none">
                                <input type="text" name="hero_buttons[{{ $i }}][url]"
                                    value="{{ $currentButtons[$i]['url'] ?? '' }}"
                                    placeholder="https://... o #contacto" maxlength="500"
                                    class="w-full rounded-lg border border-azul-900/20 bg-white px-3 py-2.5 text-sm focus:border-azul-500 focus:outline-none">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>

        {{-- ===================== HERO 2 ===================== --}}
        <section class="rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm">
            <h2 class="font-display text-xl font-bold">Sección "Conversemos y tomemos un café"</h2>

            <div class="mt-5 grid gap-5">
                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="hero2_text" class="mb-1.5 block text-sm font-semibold">Texto visible</label>
                        <input id="hero2_text" type="text" name="hero2_text"
                            value="{{ old('hero2_text', $settings->hero2_text) }}" maxlength="200"
                            class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                    </div>

                    <div>
                        <label for="hero2_background" class="mb-1.5 block text-sm font-semibold">Imagen de fondo</label>

                        @if ($settings->hero2_background_path)
                            <div class="mb-2">
                                <img src="{{ asset($settings->hero2_background_path) }}" alt="Fondo actual"
                                    class="h-20 w-full rounded-xl border border-azul-900/10 object-cover">
                                <label class="mt-1.5 flex items-center gap-2 text-sm text-red-600">
                                    <input type="checkbox" name="remove_hero2_background" value="1"
                                        class="h-4 w-4 rounded border-azul-900/30">
                                    Quitar fondo actual
                                </label>
                            </div>
                        @endif

                        <input id="hero2_background" type="file" name="hero2_background" accept="image/*"
                            class="block w-full text-sm text-azul-700 file:mr-4 file:rounded-full file:border-0 file:bg-azul-900/5 file:px-5 file:py-2.5 file:text-sm file:font-semibold file:text-azul-900 hover:file:bg-azul-900/10">
                    </div>
                </div>

                <div>
                    <label for="hero2_video" class="mb-1.5 block text-sm font-semibold">
                        Video (5 a 10 segundos)
                    </label>

                    @if ($settings->hero2_video_path)
                        <div class="mb-3">
                            <video src="{{ asset($settings->hero2_video_path) }}" muted
                                class="h-32 w-auto rounded-xl border border-azul-900/10 bg-azul-950 object-contain"></video>
                            <p class="mt-1 text-xs text-azul-700/60">
                                Actual: {{ basename($settings->hero2_video_path) }}
                            </p>
                            <label class="mt-1 flex items-center gap-2 text-sm text-red-600">
                                <input type="checkbox" name="remove_hero2_video" value="1"
                                    class="h-4 w-4 rounded border-azul-900/30">
                                Quitar video actual
                            </label>
                        </div>
                    @endif

                    <input id="hero2_video" type="file" name="hero2_video" accept="video/mp4,video/webm"
                        class="block w-full text-sm text-azul-700 file:mr-4 file:rounded-full file:border-0 file:bg-azul-900/5 file:px-5 file:py-2.5 file:text-sm file:font-semibold file:text-azul-900 hover:file:bg-azul-900/10">
                    <p class="mt-1 text-xs text-azul-700/60">MP4 o WebM · máximo 20 MB</p>
                </div>
            </div>
        </section>

        {{-- ===================== CONTACTO ===================== --}}
        <section class="rounded-2xl border border-azul-900/10 bg-white p-6 shadow-sm">
            <h2 class="font-display text-xl font-bold">Datos de contacto y redes</h2>

            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="whatsapp_number" class="mb-1.5 block text-sm font-semibold">WhatsApp</label>
                    <input id="whatsapp_number" type="text" name="whatsapp_number"
                        value="{{ old('whatsapp_number', $settings->whatsapp_number) }}" maxlength="30"
                        placeholder="+51 999 888 777"
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                </div>

                <div>
                    <label for="whatsapp_message" class="mb-1.5 block text-sm font-semibold">
                        Mensaje pre-cargado de WhatsApp
                    </label>
                    <input id="whatsapp_message" type="text" name="whatsapp_message"
                        value="{{ old('whatsapp_message', $settings->whatsapp_message) }}" maxlength="300"
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                </div>

                <div>
                    <label for="facebook_url" class="mb-1.5 block text-sm font-semibold">Facebook (URL)</label>
                    <input id="facebook_url" type="url" name="facebook_url"
                        value="{{ old('facebook_url', $settings->facebook_url) }}" maxlength="500"
                        placeholder="https://web.facebook.com/..."
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                </div>

                <div>
                    <label for="tiktok_url" class="mb-1.5 block text-sm font-semibold">TikTok (URL)</label>
                    <input id="tiktok_url" type="url" name="tiktok_url"
                        value="{{ old('tiktok_url', $settings->tiktok_url) }}" maxlength="500"
                        placeholder="https://www.tiktok.com/@..."
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                </div>

                <div>
                    <label for="credit_url" class="mb-1.5 block text-sm font-semibold">Enlace del crédito "Hecho por B1T"</label>
                    <input id="credit_url" type="url" name="credit_url"
                        value="{{ old('credit_url', $settings->credit_url) }}" maxlength="500"
                        placeholder="https://..."
                        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
                    <p class="mt-1 text-xs text-azul-700/60">Si se deja vacío, el texto se muestra sin enlace.</p>
                </div>
            </div>
        </section>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="rounded-full bg-azul-900 px-8 py-3.5 text-sm font-semibold text-blanco shadow-lg shadow-azul-900/20 transition hover:bg-azul-700">
                Guardar cambios
            </button>
        </div>
    </form>
@endsection
