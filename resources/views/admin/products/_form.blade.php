@php($product = $product ?? null)

@if ($errors->any())
    <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
        <ul class="list-inside list-disc space-y-0.5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <label for="name" class="mb-1.5 block text-sm font-semibold">Nombre *</label>
    <input id="name" type="text" name="name" value="{{ old('name', $product?->name) }}" required maxlength="150"
        placeholder="Ej. Asesoría inmobiliaria"
        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
</div>

<div>
    <label for="description" class="mb-1.5 block text-sm font-semibold">Descripción</label>
    <textarea id="description" name="description" rows="3" maxlength="1000"
        placeholder="Breve explicación del servicio"
        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">{{ old('description', $product?->description) }}</textarea>
</div>

<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label for="price" class="mb-1.5 block text-sm font-semibold">Precio</label>
        <input id="price" type="text" name="price" value="{{ old('price', $product?->price) }}" maxlength="50"
            placeholder="Ej. S/ 250 o A convenir"
            class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
    </div>

    <div>
        <label for="sort_order" class="mb-1.5 block text-sm font-semibold">Orden en el carrusel</label>
        <input id="sort_order" type="number" name="sort_order" min="0" max="999"
            value="{{ old('sort_order', $product?->sort_order ?? 0) }}"
            class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-3 text-sm focus:border-azul-500 focus:outline-none focus:ring-2 focus:ring-azul-500/20">
    </div>
</div>

<div>
    <label for="image" class="mb-1.5 block text-sm font-semibold">Imagen</label>
    <input id="image" type="file" name="image" accept="image/jpeg,image/png,image/webp"
        class="w-full rounded-xl border border-azul-900/20 bg-blanco px-4 py-2.5 text-sm file:mr-3 file:rounded-full file:border-0 file:bg-azul-900/5 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-azul-900">

    @if ($product?->image_path)
        <div class="mt-3 flex items-center gap-3">
            <img src="{{ asset($product->image_path) }}" alt="" class="h-14 w-14 rounded-xl object-cover">
            <label class="flex items-center gap-2 text-sm text-azul-700/80">
                <input type="checkbox" name="remove_image" value="1" class="rounded border-azul-900/30">
                Quitar imagen actual
            </label>
        </div>
    @endif
</div>

<label class="flex items-center gap-2.5 text-sm font-medium">
    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product?->is_active ?? true))
        class="rounded border-azul-900/30">
    Visible en la web
</label>
