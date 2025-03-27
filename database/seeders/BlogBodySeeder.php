<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blog_bodies = [
            [
                'titulo' => 'Tu Bar, en la Mira',
                'descripcion' => 'Las luces neón LED se han convertido en un elemento diferenciador en el mundo de la hospitalidad. No solo son visualmente atractivos, sino que también refuerzan la identidad de tu negocio. En este artículo, exploraremos cómo las letras luminosas pueden marcar la diferencia en la experiencia de tus clientes.',
                'id_commend_tarjeta' => 1,
                'url_image1'=>'blog-2.jpg',
                'url_image2'=>'blog-2.jpg',
                'url_image3'=>'blog-2.jpg'
            ],
            [
                'titulo' => 'Tu Bar, en la Mira',
                'descripcion' => 'Las luces neón LED se han convertido en un elemento diferenciador en el mundo de la hospitalidad. No solo son visualmente atractivos, sino que también refuerzan la identidad de tu negocio. En este artículo, exploraremos cómo las letras luminosas pueden marcar la diferencia en la experiencia de tus clientes.',
                'id_commend_tarjeta' => 2,
                'url_image1'=>'blog-2.jpg',
                'url_image2'=>'blog-2.jpg',
                'url_image3'=>'blog-2.jpg'
            ],
            [
                'titulo' => 'Tu Bar, en la Mira',
                'descripcion' => 'Las luces neón LED se han convertido en un elemento diferenciador en el mundo de la hospitalidad. No solo son visualmente atractivos, sino que también refuerzan la identidad de tu negocio. En este artículo, exploraremos cómo las letras luminosas pueden marcar la diferencia en la experiencia de tus clientes.',
                'id_commend_tarjeta' => 3,
                'url_image1'=>'blog-2.jpg',
                'url_image2'=>'blog-2.jpg',
                'url_image3'=>'blog-2.jpg'
            ],
            [
                'titulo' => 'Tu Bar, en la Mira',
                'descripcion' => 'Las luces neón LED se han convertido en un elemento diferenciador en el mundo de la hospitalidad. No solo son visualmente atractivos, sino que también refuerzan la identidad de tu negocio. En este artículo, exploraremos cómo las letras luminosas pueden marcar la diferencia en la experiencia de tus clientes.',
                'id_commend_tarjeta' => 4,
                'url_image1'=>'blog-2.jpg',
                'url_image2'=>'blog-2.jpg',
                'url_image3'=>'blog-2.jpg'
            ]
        ];

        DB::table('blog_bodies')->insert($blog_bodies);
    }
}
