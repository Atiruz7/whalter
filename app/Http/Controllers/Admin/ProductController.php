<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', [
            'products' => Product::orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateRequest($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = 'storage/'.$request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Servicio creado correctamente.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $data = $this->validateRequest($request);

        if ($request->hasFile('image')) {
            $this->deleteImage($product);
            $data['image_path'] = 'storage/'.$request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Servicio actualizado correctamente.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->deleteImage($product);
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Servicio eliminado correctamente.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validateRequest(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:1000'],
            'price' => ['nullable', 'string', 'max:50'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:999'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'image.image' => 'La imagen debe ser un archivo válido (jpg, png o webp).',
        ], [
            'name' => 'nombre del servicio',
            'description' => 'descripción',
            'price' => 'precio',
            'image' => 'imagen',
            'sort_order' => 'orden',
        ]);
    }

    private function deleteImage(Product $product): void
    {
        if ($product->image_path) {
            Storage::disk('public')->delete(ltrim($product->image_path, 'storage/'));
        }
    }
}
