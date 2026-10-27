<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Servicios de ejemplo alineados con los 5 pilares de la marca.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Asesoría inmobiliaria',
                'description' => 'Acompañamiento para comprar, vender o invertir en bienes raíces con información clara y estrategia.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Mentoría de crecimiento personal',
                'description' => 'Sesiones enfocadas en hábitos, mentalidad y organización para vivir con propósito.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Charlas motivacionales',
                'description' => 'Conferencias y mensajes para equipos, colegios y eventos que buscan inspirar a la acción.',
                'sort_order' => 3,
            ],
            [
                'name' => 'Acompañamiento emprendedor',
                'description' => 'Identificación de oportunidades y desarrollo de una mentalidad emprendedora desde cero.',
                'sort_order' => 4,
            ],
            [
                'name' => 'Estilo de vida activo',
                'description' => 'Contenido y acompañamiento sobre disciplina deportiva y hábitos saludables.',
                'sort_order' => 5,
            ],
        ];

        foreach ($services as $service) {
            Product::firstOrCreate(
                ['name' => $service['name']],
                $service + ['is_active' => true]
            );
        }
    }
}
