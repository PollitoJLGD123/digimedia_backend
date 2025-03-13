<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $contactos = [
            [
                'nombre' => 'Juan Pérez',
                'email' => 'juan@gmail.com',
                'numero' => '987654321',
                'mensaje' => 'Me interesa obtener más información sobre sus servicios.',
                'estado' => 'pendiente',
            ],
            [
                'nombre' => 'Juan Rodriguez',
                'email' => 'juan2@gmail.com',
                'numero' => '987654322',
                'mensaje' => 'Me interesa obtener más información sobre sus servicios.',
                'estado' => 'pendiente',
            ],
            [
                'nombre' => 'Juan Nuñez',
                'email' => 'juan3@gmail.com',
                'numero' => '987654323',
                'mensaje' => 'Me interesa obtener más información sobre sus servicios.',
                'estado' => 'revisado',
            ]
        ];

        DB::table('contactanos')->insert($contactos);
    }
}
