<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{

    public function run(): void
    {
        $cards = [
            [
                'titulo' => 'Tu Bar, en la Mira',
                'descripcion' => 'Haz que el nombre de tu bar destaque con letras neón LED. Crea un ambiente único que atraiga miradas y clientes. ¡Ilumina tu identidad! 🍹🔆',
                'url_image' => 'fondo_blog.png',
                'id_plantilla' => 1,
                'id_blog' => 1
            ],
            [
                'titulo' => 'GESTIÓN DE LAS REDES SOCIALES',
                'descripcion' => 'Impulsa tu marca con nuestra gestión profesional de redes sociales. Conecta, interactúa y destaca en el mundo digital. ¡Descubre cómo podemos potenciar tu presencia hoy mismo!',
                'url_image' => 'fondo_blog.png',
                'id_plantilla' => 2,
                'id_blog' => 2
            ],
            [
                'titulo' => 'BRANDING Y DISEÑO',
                'descripcion' => 'Atrévete a explorar el potencial ilimitado que tiene una estrategia de branding bien ejecutada y conquista el corazón y la mente de tus clientes.',
                'url_image' => 'fondo_blog.png',
                'id_plantilla' => 3,
                'id_blog' => 3
            ],
            [
                'titulo' => 'MARKETING Y GESTIÓN DIGITAL',
                'descripcion' => 'Una estrategia SEO optimiza contenido y estructura web, utilizando palabras clave y enlaces para mejorar la visibilidad y atraer tráfico orgánico. ¡Descubre cómo podemos potenciar tu presencia hoy mismo!',
                'url_image' => 'fondo_blog.png',
                'id_plantilla' => 3,
                'id_blog' => 4
            ],
        ];

        DB::table('cards')->insert($cards);
    }
}
