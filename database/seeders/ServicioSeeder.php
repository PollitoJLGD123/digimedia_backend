<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            ['nombre' => 'Servicio Consultoria', 'descripcion' => 'Este es el servicio de consultoria'],
            ['nombre' => 'Servicio Web', 'descripcion' => 'Este es el servicio web'],
            ['nombre' => 'Servicio Marketing', 'descripcion' => 'Este es el servicio de marketing'],
        ];

        DB::table('servicios')->insert($servicios);
    }
}
