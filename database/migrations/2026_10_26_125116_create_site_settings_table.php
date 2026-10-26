<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();

            // Marca / logo
            $table->string('brand_name')->default('Walther');
            $table->string('brand_logo_path')->nullable();
            $table->string('tagline')->nullable();

            // Hero principal
            $table->string('hero_image_path')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->json('hero_buttons')->nullable();

            // Hero 2
            $table->string('hero2_background_path')->nullable();
            $table->string('hero2_text')->nullable();
            $table->string('hero2_video_path')->nullable();

            // Contacto / redes
            $table->string('whatsapp_number')->nullable();
            $table->string('whatsapp_message')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('tiktok_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
