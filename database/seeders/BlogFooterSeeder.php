<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blog_footers = [
            [
                'titulo' => 'Tu Bar, en la Mira',
                'descripcion' => 'Invertir en luces neón LED no solo mejora la estética de tu bar, sino que también influye en la percepción de los clientes y fortalece tu marca. ¡Haz que tu bar brille con luz propia!',
                'url_image1'=>'blog-2.jpg',
                'url_image2'=>'blog-2.jpg',
                'url_image3'=>'blog-2.jpg'
            ],
            [
                'titulo' => 'Tu Bar, en la Mira',
                'descripcion' => 'Invertir en luces neón LED no solo mejora la estética de tu bar, sino que también influye en la percepción de los clientes y fortalece tu marca. ¡Haz que tu bar brille con luz propia!',
                'url_image1'=>'blog-2.jpg',
                'url_image2'=>'blog-2.jpg',
                'url_image3'=>'blog-2.jpg'
            ],
            [
                'titulo' => 'Tu Bar, en la Mira',
                'descripcion' => 'Invertir en luces neón LED no solo mejora la estética de tu bar, sino que también influye en la percepción de los clientes y fortalece tu marca. ¡Haz que tu bar brille con luz propia!',
                'url_image1'=>'blog-2.jpg',
                'url_image2'=>'blog-2.jpg',
                'url_image3'=>'blog-2.jpg'
            ],
            [
                'titulo' => 'Tu Bar, en la Mira',
                'descripcion' => 'Invertir en luces neón LED no solo mejora la estética de tu bar, sino que también influye en la percepción de los clientes y fortalece tu marca. ¡Haz que tu bar brille con luz propia!',
                'url_image1'=>'blog-2.jpg',
                'url_image2'=>'blog-2.jpg',
                'url_image3'=>'blog-2.jpg'
            ],
        ];

        DB::table('blog_footers')->insert($blog_footers);
    }
}
