<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrandIdentityTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_contains_all_13_brand_identity_elements(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Encabezado de marca
        $response->assertSeeText('WALTHER');
        $response->assertSeeText('Marca Personal');
        $response->assertSeeText('Walther Qquesuallpa Yucra');
        $response->assertSeeText('Bienes Raíces');
        $response->assertSeeText('Motivación');
        $response->assertSeeText('Crecimiento Personal');
        $response->assertSeeText('Emprendimiento');
        $response->assertSeeText('Deporte');

        // 1. Identidad de la marca
        $response->assertSeeText('1. Identidad de la Marca');
        $response->assertSeeText('WALTHER es una marca personal creada para inspirar, orientar y generar oportunidades');
        $response->assertSeeText('La marca integra cinco pilares:');

        // 2. Misión
        $response->assertSeeText('2. Misión');
        $response->assertSeeText('Mi misión es inspirar y ayudar a las personas a crecer en lo personal, profesional y económico');

        // 3. Visión
        $response->assertSeeText('3. Visión');
        $response->assertSeeText('Mi visión es convertir a WALTHER en una marca personal reconocida y confiable');

        // 4. Propósito
        $response->assertSeeText('4. Propósito');
        $response->assertSeeText('Llegar a las personas que necesitan escuchar un mensaje de esperanza');

        // 5. Valores
        $response->assertSeeText('5. Valores de WALTHER');
        $response->assertSeeText('Disciplina');
        $response->assertSeeText('Perseverancia');
        $response->assertSeeText('Responsabilidad');
        $response->assertSeeText('Servicio');
        $response->assertSeeText('Integridad');
        $response->assertSeeText('Fe y propósito');
        $response->assertSeeText('Superación');

        // 6. Pilares de contenido
        $response->assertSeeText('6. Pilares de Contenido');
        $response->assertSeeText('Deporte y Vida Activa');
        $response->assertSee('images/pilares/bienes-raices.jpg');
        $response->assertSee('images/pilares/motivacion.jpg');
        $response->assertSee('images/pilares/crecimiento-personal.jpg');
        $response->assertSee('images/pilares/emprendimiento.jpg');
        $response->assertSee('images/pilares/deporte.jpg');

        // 7. Público al que quiero llegar
        $response->assertSeeText('7. Público al que quiero llegar');
        $response->assertSeeText('WALTHER está dirigido a jóvenes y adultos que desean mejorar su vida');

        // 8. Propuesta de valor
        $response->assertSeeText('8. Propuesta de valor');
        $response->assertSeeText('WALTHER busca diferenciarse combinando oportunidades reales con un mensaje de crecimiento');

        // 9. Objetivos de la marca
        $response->assertSeeText('9. Objetivos de la Marca');
        $response->assertSeeText('Construir una comunidad sólida alrededor de la marca personal WALTHER.');
        $response->assertSeeText('Llegar progresivamente a una audiencia amplia a nivel nacional e internacional.');
        $response->assertSeeText('Posicionar a WALTHER como una marca confiable en bienes raíces, motivación y emprendimiento.');
        $response->assertSeeText('Compartir contenido constante, útil, auténtico y cercano.');
        $response->assertSeeText('Generar oportunidades de negocio y alianzas relacionadas con bienes raíces y emprendimiento.');
        $response->assertSeeText('Motivar a más personas a practicar deporte y desarrollar disciplina.');
        $response->assertSeeText('Inspirar a las personas a establecer metas y trabajar por ellas.');

        // 10. Frase central de la marca
        $response->assertSeeText('10. Frase Central de la Marca');
        $response->assertSeeText('Inspira. Aprende. Emprende. Invierte. Crece.');

        // 11. Mensaje de marca
        $response->assertSeeText('11. Mensaje de Marca');
        $response->assertSeeText('WALTHER — Una marca para personas que quieren crecer, superar sus límites y construir un futuro con propósito.');

        // 12. Presentación corta
        $response->assertSeeText('12. Presentación Personal');
        $response->assertSeeText('Soy Walther Qquesuallpa Yucra, creador de WALTHER');

        // 13. Compromiso con la audiencia
        $response->assertSeeText('13. Compromiso con mi Audiencia');
        $response->assertSeeText('Me comprometo a construir una marca auténtica, responsable y cercana');

        // Secciones con anclas
        $response->assertSee('id="inicio"', false);
        $response->assertSee('id="identidad"', false);
        $response->assertSee('id="mision-vision"', false);
        $response->assertSee('id="valores"', false);
        $response->assertSee('id="pilares"', false);
        $response->assertSee('id="propuesta"', false);
        $response->assertSee('id="objetivos"', false);
        $response->assertSee('id="mensaje"', false);
        $response->assertSee('id="sobre-walther"', false);
        $response->assertSee('id="compromiso"', false);
    }
}
