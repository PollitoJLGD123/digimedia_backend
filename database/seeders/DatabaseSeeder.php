<?php

namespace Database\Seeders;

use App\Models\Contactanos;
use App\Models\Permiso;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BlogHeaderSeeder::class,
            BlogFooterSeeder::class,
            CommendTarjetaSeeder::class,
            BlogBodySeeder::class,
            TarjetaSeeder::class,
            BlogSeeder::class,
            ServicioSeeder::class,
            ContactanosSeeder::class,
            ReclamacionSeeder::class,
            ModalservicioSeeder::class,
            RolSeeder::class,
            EmpleadoSeeder::class,
            CardSeeder::class,
            MailModalSeeder::class,
            WatModalSeeder::class,
            PermisosSeeder::class,
        ]);
    }
}
