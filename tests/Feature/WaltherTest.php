<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\SiteSettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class WaltherTest extends TestCase
{
    use RefreshDatabase;

    private function createAdmin(): User
    {
        return User::factory()->create([
            'email' => 'admin@walther.test',
            'password' => Hash::make('password'),
        ]);
    }

    public function test_home_page_loads_successfully_without_products(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Walther');
        // Cuando no hay productos, la sección no se muestra
        $response->assertDontSee('id="servicios"', false);
    }

    public function test_home_page_shows_products_when_active(): void
    {
        Product::create([
            'name' => 'Asesoría Inmobiliaria VIP',
            'description' => 'Servicio especializado en inversión',
            'price' => 'S/ 500',
            'is_active' => true,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Asesoría Inmobiliaria VIP');
        $response->assertSee('id="servicios"', false);
    }

    public function test_inactive_products_are_not_displayed_on_public_page(): void
    {
        Product::create([
            'name' => 'Servicio Oculto',
            'description' => 'No debe verse',
            'is_active' => false,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertDontSee('Servicio Oculto');
        $response->assertDontSee('id="servicios"', false);
    }

    public function test_admin_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');

        $response = $this->get('/admin/contenido');
        $response->assertRedirect('/admin/login');

        $response = $this->get('/admin/productos');
        $response->assertRedirect('/admin/login');

        $response = $this->get('/admin/perfil');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $admin = $this->createAdmin();

        $response = $this->post('/admin/login', [
            'email' => 'admin@walther.test',
            'password' => 'password',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($admin);
    }

    public function test_admin_cannot_login_with_invalid_credentials(): void
    {
        $this->createAdmin();

        $response = $this->post('/admin/login', [
            'email' => 'admin@walther.test',
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_admin_can_update_site_settings(): void
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)->put('/admin/contenido', [
            'brand_name' => 'WALTHER Brand',
            'tagline' => 'Inspiración y Crecimiento',
            'hero_title' => 'Construye tu futuro',
            'hero_description' => 'Aprende e invierte',
            'hero_buttons' => [
                ['text' => 'Agenda Hoy', 'url' => 'https://wa.me/51929664204'],
                ['text' => 'Conócenos', 'url' => '#contacto'],
            ],
            'hero2_text' => 'Tomémonos un café hoy',
            'whatsapp_number' => '+51 929 664 204',
            'whatsapp_message' => 'Deseo agendar una reunión mientras nos tomamos un café',
            'facebook_url' => 'https://web.facebook.com/walter.quesuallpayucra',
            'tiktok_url' => 'https://www.tiktok.com/@walther_04',
            'credit_url' => 'https://b1t.pe',
        ]);

        $response->assertRedirect('/admin/contenido');
        $response->assertSessionHas('status');

        $this->assertDatabaseHas('site_settings', [
            'brand_name' => 'WALTHER Brand',
            'hero_title' => 'Construye tu futuro',
            'credit_url' => 'https://b1t.pe',
        ]);
    }

    public function test_admin_can_create_update_and_delete_product(): void
    {
        $admin = $this->createAdmin();
        Storage::fake('public');

        // Create
        $response = $this->actingAs($admin)->post('/admin/productos', [
            'name' => 'Mentoría 1 a 1',
            'description' => 'Acompañamiento personalizado',
            'price' => 'S/ 300',
            'sort_order' => 1,
            'is_active' => '1',
            'image' => UploadedFile::fake()->create('mentoria.jpg', 100, 'image/jpeg'),
        ]);

        $response->assertRedirect('/admin/productos');
        $this->assertDatabaseHas('products', [
            'name' => 'Mentoría 1 a 1',
            'price' => 'S/ 300',
            'is_active' => true,
        ]);

        $product = Product::where('name', 'Mentoría 1 a 1')->first();
        $this->assertNotNull($product->image_path);

        // Update with deactivation
        $response = $this->actingAs($admin)->put("/admin/productos/{$product->id}", [
            'name' => 'Mentoría 1 a 1 Avanzada',
            'description' => 'Acompañamiento avanzado',
            'price' => 'S/ 450',
            'sort_order' => 2,
            // is_active unchecked
        ]);

        $response->assertRedirect('/admin/productos');
        $product->refresh();
        $this->assertEquals('Mentoría 1 a 1 Avanzada', $product->name);
        $this->assertEquals('S/ 450', $product->price);
        $this->assertFalse($product->is_active);

        // Delete
        $response = $this->actingAs($admin)->delete("/admin/productos/{$product->id}");
        $response->assertRedirect('/admin/productos');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_admin_can_update_profile_and_change_password(): void
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)->put('/admin/perfil', [
            'name' => 'Walther Admin',
            'email' => 'nuevo@walther.test',
            'current_password' => 'password',
            'password' => 'new-secret-password',
            'password_confirmation' => 'new-secret-password',
        ]);

        $response->assertRedirect('/admin/perfil');
        $response->assertSessionHas('status');

        $admin->refresh();
        $this->assertEquals('Walther Admin', $admin->name);
        $this->assertEquals('nuevo@walther.test', $admin->email);
        $this->assertTrue(Hash::check('new-secret-password', $admin->password));
    }

    public function test_seeders_are_idempotent(): void
    {
        $this->seed(AdminUserSeeder::class);
        $this->seed(SiteSettingSeeder::class);
        $this->seed(ProductSeeder::class);

        $adminCount1 = User::count();
        $settingsCount1 = SiteSetting::count();
        $productsCount1 = Product::count();

        // Run seeders again
        $this->seed(AdminUserSeeder::class);
        $this->seed(SiteSettingSeeder::class);
        $this->seed(ProductSeeder::class);

        $this->assertEquals($adminCount1, User::count());
        $this->assertEquals($settingsCount1, SiteSetting::count());
        $this->assertEquals($productsCount1, Product::count());
    }

    public function test_admin_can_upload_and_remove_hero2_video_and_background(): void
    {
        $admin = $this->createAdmin();
        Storage::fake('public');

        $videoFile = UploadedFile::fake()->create('promo.mp4', 1024, 'video/mp4');
        $bgFile = UploadedFile::fake()->create('bg.jpg', 500, 'image/jpeg');

        $response = $this->actingAs($admin)->put('/admin/contenido', [
            'brand_name' => 'Walther',
            'hero2_video' => $videoFile,
            'hero2_background' => $bgFile,
        ]);

        $response->assertRedirect('/admin/contenido');
        $settings = SiteSetting::first();
        $this->assertNotNull($settings->hero2_video_path);
        $this->assertNotNull($settings->hero2_background_path);

        // Remove video and background
        $response = $this->actingAs($admin)->put('/admin/contenido', [
            'brand_name' => 'Walther',
            'remove_hero2_video' => '1',
            'remove_hero2_background' => '1',
        ]);

        $response->assertRedirect('/admin/contenido');
        $settings->refresh();
        $this->assertNull($settings->hero2_video_path);
        $this->assertNull($settings->hero2_background_path);
    }

    public function test_hero2_video_validation_rejects_invalid_mime_and_size(): void
    {
        $admin = $this->createAdmin();
        Storage::fake('public');

        // Invalid mime
        $invalidMime = UploadedFile::fake()->create('audio.mp3', 500, 'audio/mpeg');
        $response = $this->actingAs($admin)->put('/admin/contenido', [
            'brand_name' => 'Walther',
            'hero2_video' => $invalidMime,
        ]);
        $response->assertSessionHasErrors('hero2_video');

        // File exceeding 20 MB (20480 KB)
        $largeVideo = UploadedFile::fake()->create('big.mp4', 21000, 'video/mp4');
        $response = $this->actingAs($admin)->put('/admin/contenido', [
            'brand_name' => 'Walther',
            'hero2_video' => $largeVideo,
        ]);
        $response->assertSessionHasErrors('hero2_video');
    }
}
