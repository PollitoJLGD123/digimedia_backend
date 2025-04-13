<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WatModalSeeder extends Seeder
{

    public function run(): void
    {
        $wat_modals = [
            [
                'estado' => 1,
                'error' => 'Error, el numero no existe',
                'id_modalservicio' => 1,
                'number_message' => 1,
                'fecha' => now(),
            ],
            [
                'estado' => 0,
                'error' => '',
                'id_modalservicio' => 1,
                'number_message' => 2,
                'fecha' => now(),
            ],

            [
                'estado' => 1,
                'error' => '',
                'id_modalservicio' => 2,
                'number_message' => 1,
                'fecha' => now(),
            ],
            [
                'estado' => 1,
                'error' => '',
                'id_modalservicio' => 2,
                'number_message' => 2,
                'fecha' => now(),
            ],

            [
                'estado' => 1,
                'error' => 'Error de envio, el numero no existe',
                'id_modalservicio' => 3,
                'number_message' => 1,
                'fecha' => now(),
            ],
            [
                'estado' => 0,
                'error' => '',
                'id_modalservicio' => 3,
                'number_message' => 2,
                'fecha' => now(),
            ],

            [
                'estado' => 1,
                'error' => '',
                'id_modalservicio' => 4,
                'number_message' => 1,
                'fecha' => now(),
            ],
            [
                'estado' => 1,
                'error' => '',
                'id_modalservicio' => 4,
                'number_message' => 2,
                'fecha' => now(),
            ],
        ];

        DB::table('modal_wats')->insert($wat_modals);
    }
}
