<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
=======
>>>>>>> f5e469399bb72d8bbc56798a0209324f59c1ffbc
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
<<<<<<< HEAD
     *
     * Carga los datos guardados desde el panel administrativo y los
     * sobreescribe sobre config/site.php para que las vistas siempre
     * muestren la última versión guardada.
     */
    public function boot(): void
    {
        // Evita fallar durante migrate:fresh, cuando la tabla aún no existe.
        if (! Schema::hasTable('site_settings')) {
            return;
        }

        $settings = SiteSetting::first();

        if (! $settings) {
            return;
        }

        config([
            'site.brand.name' => $settings->brand_name ?: 'Walther',
            'site.brand.logo_image' => $settings->brand_logo_path,
            'site.brand.tagline' => $settings->tagline,

            'site.hero.image' => $settings->hero_image_path,
            'site.hero.title' => $settings->hero_title,
            'site.hero.description' => $settings->hero_description,
            'site.hero.buttons' => $settings->hero_buttons ?? [],

            'site.hero2.background' => $settings->hero2_background_path,
            'site.hero2.text' => $settings->hero2_text,
            'site.hero2.video' => $settings->hero2_video_path,

            'site.contact.whatsapp_display' => $settings->whatsapp_number,
            'site.contact.whatsapp_message' => $settings->whatsapp_message,
            'site.contact.whatsapp_url' => self::whatsappUrl($settings->whatsapp_number, $settings->whatsapp_message),
            'site.contact.facebook' => $settings->facebook_url,
            'site.contact.tiktok' => $settings->tiktok_url,

            'site.credit.url' => $settings->credit_url,
        ]);
    }

    /**
     * Construye el enlace de WhatsApp con el mensaje pre-cargado.
     */
    private static function whatsappUrl(?string $number, ?string $message): ?string
    {
        if (! $number) {
            return null;
        }

        $digits = preg_replace('/\D/', '', $number);
        $url = 'https://wa.me/'.$digits;

        if ($message) {
            $url .= '?text='.rawurlencode($message);
        }

        return $url;
=======
     */
    public function boot(): void
    {
        //
>>>>>>> f5e469399bb72d8bbc56798a0209324f59c1ffbc
    }
}
