<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Kevin',
                'email' => 'keving.kpg@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Jose Luis',
                'email' => 'joseluisjlgd123@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Juan Carlos',
                'email' => 'tmlighting@hotmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Krizzia Martina',
                'email' => 'krizzia_saavedra201@hotmail.com',
                'password' => Hash::make('12345678'),
            ]
        ];

        DB::table('users')->insert($users);
    }
}
