<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'id_blog_head' => 1,
                'id_blog_body' => 1,
                'id_blog_footer' => 1
            ],
            [
                'id_blog_head' => 2,
                'id_blog_body' => 2,
                'id_blog_footer' => 2
            ],
            [
                'id_blog_head' => 3,
                'id_blog_body' => 3,
                'id_blog_footer' => 3
            ],
            [
                'id_blog_head' => 4,
                'id_blog_body' => 4,
                'id_blog_footer' => 4
            ]
        ];

        DB::table('blogs')->insert($blogs);
    }
}
