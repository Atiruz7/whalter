<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Datos por defecto: coinciden con config/site.php para que la web
     * se vea igual antes y después de que exista el registro en la BD.
     */
    public function run(): void
    {
        SiteSetting::firstOrCreate([], [
            'brand_name' => 'Walther',
            'brand_logo_path' => null,
            'tagline' => 'Bienes Raíces • Motivación • Crecimiento Personal • Emprendimiento • Deporte',
            'hero_image_path' => null,
            'hero_title' => 'Una marca para personas que quieren crecer, superar sus límites y construir un futuro con propósito.',
            'hero_description' => 'Inspira. Aprende. Emprende. Invierte. Crece.',
            'hero_buttons' => [
                ['text' => 'Agendar una reunión', 'url' => '#contacto'],
                ['text' => 'Escríbenos', 'url' => '#contacto'],
            ],
            'hero2_background_path' => 'images/hero2-fondoBanner.jpg',
            'hero2_text' => 'Conversemos y tomemos un café',
            'hero2_video_path' => 'videos/hero2.mp4',
            'whatsapp_number' => '+51 929 664 204',
            'whatsapp_message' => 'Deseo agendar una reunión mientras nos tomamos un café',
            'facebook_url' => 'https://web.facebook.com/walter.quesuallpayucra',
            'tiktok_url' => 'https://www.tiktok.com/@walther_04',
        ]);
    }
}
