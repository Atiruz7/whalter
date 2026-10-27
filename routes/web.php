
<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Página principal
|--------------------------------------------------------------------------
*/

Route::get('/', HomeController::class)->name('home');

/*
|--------------------------------------------------------------------------
| Acceso al panel (invitados)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [LoginController::class, 'show'])
        ->name('admin.login');

    Route::post('/admin/login', [LoginController::class, 'login'])
        ->name('admin.login.attempt');
});

/*
|--------------------------------------------------------------------------
| Panel del administrador (autenticados)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])
            ->name('logout');

        Route::get('/', DashboardController::class)
            ->name('dashboard');

        Route::get('/contenido', [SettingsController::class, 'edit'])
            ->name('settings.edit');

        Route::put('/contenido', [SettingsController::class, 'update'])
            ->name('settings.update');

        Route::resource('productos', ProductController::class)
            ->except('show')
            ->parameters(['productos' => 'product'])
            ->names('products');

        Route::get('/perfil', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::put('/perfil', [ProfileController::class, 'update'])
            ->name('profile.update');
    });
