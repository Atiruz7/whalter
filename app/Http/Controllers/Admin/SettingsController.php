<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * Formulario para editar el contenido del sitio.
     */
    public function edit(): View
    {
        return view('admin.settings', [
            'settings' => $this->settings(),
        ]);
    }

    /**
     * Guarda los cambios del formulario.
     */
    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'brand_name' => ['required', 'string', 'max:100'],
            'brand_logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'remove_brand_logo' => ['nullable', 'boolean'],
            'tagline' => ['nullable', 'string', 'max:255'],

            'hero_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_hero_image' => ['nullable', 'boolean'],
            'hero_title' => ['nullable', 'string', 'max:200'],
            'hero_description' => ['nullable', 'string', 'max:1000'],
            'hero_buttons' => ['nullable', 'array', 'max:2'],
            'hero_buttons.*.text' => ['nullable', 'string', 'max:60'],
            'hero_buttons.*.url' => ['nullable', 'string', 'max:500'],

            'hero2_background' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_hero2_background' => ['nullable', 'boolean'],
            'hero2_text' => ['nullable', 'string', 'max:200'],
            'hero2_video' => ['nullable', 'file', 'mimes:mp4,webm', 'max:20480'],
            'remove_hero2_video' => ['nullable', 'boolean'],

            'whatsapp_number' => ['nullable', 'string', 'max:30'],
            'whatsapp_message' => ['nullable', 'string', 'max:300'],
            'facebook_url' => ['nullable', 'url', 'max:500'],
            'tiktok_url' => ['nullable', 'url', 'max:500'],
            'credit_url' => ['nullable', 'url', 'max:500'],
        ], [
            'hero_buttons.*.url' => 'El enlace del botón debe ser una URL válida (ej. https://... o #contacto).',
            'facebook_url' => 'La dirección de Facebook debe ser una URL válida.',
            'tiktok_url' => 'La dirección de TikTok debe ser una URL válida.',
            'credit_url' => 'La dirección del crédito debe ser una URL válida.',
            'hero_image.image' => 'El fondo del banner debe ser una imagen (jpg, png o webp).',
            'hero2_video.mimes' => 'El video debe estar en formato mp4 o webm.',
        ], [
            'brand_name' => 'nombre del sitio',
            'brand_logo' => 'logo',
            'tagline' => 'descripción corta',
            'hero_image' => 'imagen del banner',
            'hero_title' => 'título del banner',
            'hero_description' => 'descripción del banner',
            'hero_buttons' => 'botones del banner',
            'hero2_background' => 'fondo de la sección café',
            'hero2_text' => 'texto de la sección café',
            'hero2_video' => 'video de la sección café',
            'whatsapp_number' => 'número de WhatsApp',
            'whatsapp_message' => 'mensaje de WhatsApp',
            'facebook_url' => 'enlace de Facebook',
            'tiktok_url' => 'enlace de TikTok',
            'credit_url' => 'enlace del crédito',
        ]);

        $settings = $this->settings();

        // Archivos: si llega uno nuevo se reemplaza; si se marca "quitar", se elimina.
        $settings->brand_logo_path = $this->handleUpload($request, 'brand_logo', 'remove_brand_logo', 'images', $settings->brand_logo_path);
        $settings->hero_image_path = $this->handleUpload($request, 'hero_image', 'remove_hero_image', 'images', $settings->hero_image_path);
        $settings->hero2_background_path = $this->handleUpload($request, 'hero2_background', 'remove_hero2_background', 'images', $settings->hero2_background_path);
        $settings->hero2_video_path = $this->handleUpload($request, 'hero2_video', 'remove_hero2_video', 'videos', $settings->hero2_video_path);

        $settings->brand_name = $this->sanitize($data['brand_name']);
        $settings->tagline = $this->sanitize($data['tagline'] ?? null);
        $settings->hero_title = $this->sanitize($data['hero_title'] ?? null);
        $settings->hero_description = $this->sanitize($data['hero_description'] ?? null);
        $settings->hero_buttons = $this->cleanButtons($data['hero_buttons'] ?? []);
        $settings->hero2_text = $this->sanitize($data['hero2_text'] ?? null);
        $settings->whatsapp_number = $this->sanitize($data['whatsapp_number'] ?? null);
        $settings->whatsapp_message = $this->sanitize($data['whatsapp_message'] ?? null);
        $settings->facebook_url = $this->sanitize($data['facebook_url'] ?? null);
        $settings->tiktok_url = $this->sanitize($data['tiktok_url'] ?? null);
        $settings->credit_url = $this->sanitize($data['credit_url'] ?? null);
        $settings->save();

        return redirect()
            ->route('admin.settings.edit')
            ->with('status', 'Contenido guardado correctamente.');
    }

    /**
     * Obtiene (o crea) el registro único de configuración.
     */
    private function settings(): SiteSetting
    {
        return SiteSetting::first() ?? new SiteSetting();
    }

    /**
     * Sube el archivo indicado, borra el anterior y devuelve la ruta pública.
     *
     * Se guarda el prefijo "storage/" para que las vistas puedan usar
     * asset($ruta) directamente (el symlink public/storage resuelve el resto).
     */
    private function handleUpload(Request $request, string $field, string $removeField, string $directory, ?string $currentPath): ?string
    {
        $currentDiskPath = $currentPath ? ltrim($currentPath, 'storage/') : null;

        if ($request->boolean($removeField)) {
            if ($currentDiskPath && Storage::disk('public')->exists($currentDiskPath)) {
                Storage::disk('public')->delete($currentDiskPath);
            }

            return null;
        }

        if (! $request->hasFile($field) || ! $request->file($field)->isValid()) {
            return $currentPath;
        }

        $newDiskPath = $request->file($field)->store($directory, 'public');

        if ($currentDiskPath && $currentDiskPath !== $newDiskPath && Storage::disk('public')->exists($currentDiskPath)) {
            Storage::disk('public')->delete($currentDiskPath);
        }

        return 'storage/'.$newDiskPath;
    }

    /**
     * Elimina botones vacíos y normaliza las claves.
     *
     * @return array<int, array{text: string, url: string}>
     */
    private function cleanButtons(array $buttons): array
    {
        return array_values(array_filter(array_map(fn (array $button) => [
            'text' => trim($this->sanitize($button['text'] ?? '') ?? ''),
            'url' => trim($this->sanitize($button['url'] ?? '') ?? ''),
        ], $buttons), fn (array $button) => $button['text'] !== '' && $button['url'] !== ''));
    }

    /**
     * Corrige cadenas con codificación inválida (evita fallos al guardar JSON).
     */
    private function sanitize(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    }
}
