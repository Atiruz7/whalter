<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Muestra la página principal del sitio.
     *
     * El contenido textual, los botones y los datos de contacto viven en
     * config/site.php. Cuando la base de datos esté lista, cada sección
     * reemplaza esos valores por su consulta correspondiente.
     */
    public function __invoke(): View
    {
        return view('welcome', [
            'products' => Product::active()->get(),
        ]);
    }
}
