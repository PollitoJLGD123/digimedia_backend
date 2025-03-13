<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalservicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modalServicios = [
            [
                'nombre' => 'Ana Torres',
                'telefono' => '987654321',
                'correo' => 'ana@gmail.com',
                'id_servicio' => 1,
            ],
            [
                'nombre' => 'Ana Rodriguez',
                'telefono' => '987654322',
                'correo' => 'ana2@gmail.com',
                'id_servicio' => 2,
            ],
            [
                'nombre' => 'Anita Santos',
                'telefono' => '987654323',
                'correo' => 'ana3@gmail.com',
                'id_servicio' => 3,
            ],
        ];

        DB::table('modalservicios')->insert($modalServicios);
    }
}
