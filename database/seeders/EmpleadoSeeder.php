<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleados = [
            [
                'nombre' => 'Kevin',
                'apellido' => 'Parimango',
                'email' => 'kevin@gmail.com',
                'dni' => '12345678',
                'telefono' => '123456789',
                'id_user' => 1,
                'id_rol' => 1,
            ],
            [
                'nombre' => 'Jose Luis',
                'apellido' => 'Gutierrez',
                'email' => 'joseluis@gmail.com',
                'dni' => '75849302',
                'telefono' => '956325147',
                'id_user' => 2,
                'id_rol' => 1,
            ],
            [
                'nombre' => 'Juan Carlos',
                'apellido' => 'Parimango',
                'email' => 'juancarlosnhl2023@outlook.es',
                'dni' => '75481526',
                'telefono' => '936910425',
                'id_user' => 3,
                'id_rol' => 1,
            ],
        ];
        DB::table('empleados')->insert($empleados);
    }
}
