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
                'email' => 'kevin@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Jose Luis',
                'email' => 'joseluis@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Juan Carlos',
                'email' => 'juancarlosnhl2023@outlook.es',
                'password' => Hash::make('123456'),
            ]
        ];

        DB::table('users')->insert($users);
    }
}
