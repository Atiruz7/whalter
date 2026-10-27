<?php

/*
|--------------------------------------------------------------------------
| Datos del sitio (fuente de verdad del contenido)
|--------------------------------------------------------------------------
| Todos los textos que se muestran en la web viven aquí. Por ahora son
| valores fijos; el panel administrativo (BD) los sobreescribirá en la
| etapa siguiente sin tocar las vistas.
*/

$whatsapp = '51929664204';
$whatsappMessage = 'Deseo agendar una reunión mientras nos tomamos un café';
$whatsappUrl = 'https://wa.me/'.$whatsapp.'?text='.rawurlencode($whatsappMessage);

return [

    'brand' => [
        // Logo: texto corto editable. Si se desea imagen, colocar la ruta en 'logo_image'.
        'name' => 'Walther',
        'logo_image' => null,
        'tagline' => 'Bienes Raíces • Motivación • Crecimiento Personal • Emprendimiento • Deporte',
    ],

    // Botón discreto del header para que el administrador ingrese.
    'admin' => [
        'login_label' => 'Admin',
        'login_url' => '/admin/login',
    ],

    // Atajos del header: enlaces a las secciones principales de la marca.
    'nav' => [
        ['label' => 'Inicio', 'url' => '#inicio'],
        ['label' => 'Identidad', 'url' => '#identidad'],
        ['label' => 'Valores', 'url' => '#valores'],
        ['label' => 'Pilares', 'url' => '#pilares'],
        ['label' => 'Propuesta', 'url' => '#propuesta'],
        ['label' => 'Objetivos', 'url' => '#objetivos'],
        ['label' => 'Sobre Walther', 'url' => '#sobre-walther'],
        ['label' => 'Servicios', 'url' => '#servicios'],
        ['label' => 'Contacto', 'url' => '#contacto'],
    ],

    /*
    | 'image'   => ruta relativa a public/ (ej. 'images/hero-fondo.jpg').
    |              null = se muestra un degradado de la paleta.
    | 'title' y 'description' son opcionales: si están vacíos no se pintan.
    | 'buttons' => cada botón requiere 'text' y 'url'; los incompletos se ignoran.
    */
    'hero' => [
        'image' => null,
        'title' => 'Una marca para personas que quieren crecer, superar sus límites y construir un futuro con propósito.',
        'description' => 'Inspira. Aprende. Emprende. Invierte. Crece.',
        'buttons' => [
            ['text' => 'Agendar una reunión', 'url' => $whatsappUrl],
            ['text' => 'Escríbenos', 'url' => '#contacto'],
        ],
    ],

    /*
    | Hero 2 (sección café + video)
    | 'video' => ruta relativa a public/ (5 a 10 segundos). null = fallback visual.
    */
    'hero2' => [
        'background' => 'images/hero2-fondoBanner.jpg',
        'text' => 'Conversemos y tomemos un café',
        'video' => 'videos/hero2.mp4',
    ],

    // Redes y contacto: se muestran en el footer y en el botón de WhatsApp.
    'contact' => [
        'whatsapp_display' => '+51 929 664 204',
        'whatsapp_message' => $whatsappMessage,
        'whatsapp_url' => $whatsappUrl,
        'facebook' => 'https://web.facebook.com/walter.quesuallpayucra',
        'tiktok' => 'https://www.tiktok.com/@walther_04',
    ],

    // Crédito del pie de página: si 'url' es null se muestra solo el texto.
    'credit' => [
        'text' => 'Hecho por B1T',
        'url' => null,
    ],

];
