<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permiso;
use App\Models\Rol;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            // Contactos
            ['nombre' => 'Ver contactos', 'descripcion' => 'Permite ver los contactos'],
            ['nombre' => 'Editar contactos', 'descripcion' => 'Permite editar contactos'],
            ['nombre' => 'Eliminar contactos', 'descripcion' => 'Permite eliminar contactos'],
            
            // Reclamaciones
            ['nombre' => 'Ver reclamaciones', 'descripcion' => 'Permite ver las reclamaciones'],
            ['nombre' => 'Editar reclamaciones', 'descripcion' => 'Permite editar reclamaciones'],
            ['nombre' => 'Eliminar reclamaciones', 'descripcion' => 'Permite eliminar reclamaciones'],
            
            // Modales
            ['nombre' => 'Ver modales', 'descripcion' => 'Permite ver los modales'],
            ['nombre' => 'Editar modales', 'descripcion' => 'Permite editar modales'],
            ['nombre' => 'Eliminar modales', 'descripcion' => 'Permite eliminar modales'],
            
            // Servicios
            ['nombre' => 'Ver servicios', 'descripcion' => 'Permite ver los servicios'],
            ['nombre' => 'Crear servicios', 'descripcion' => 'Permite crear servicios'],
            ['nombre' => 'Editar servicios', 'descripcion' => 'Permite editar servicios'],
            ['nombre' => 'Eliminar servicios', 'descripcion' => 'Permite eliminar servicios'],

            // Roles
            ['nombre' => 'Ver roles', 'descripcion' => 'Permite ver la lista de roles'],
            ['nombre' => 'Crear roles', 'descripcion' => 'Permite crear nuevos roles'],
            ['nombre' => 'Editar roles', 'descripcion' => 'Permite modificar roles existentes'],
            ['nombre' => 'Eliminar roles', 'descripcion' => 'Permite eliminar roles existentes'],
            
            // Permisos
            ['nombre' => 'Ver permisos', 'descripcion' => 'Permite ver la lista de permisos'],
            ['nombre' => 'Crear permisos', 'descripcion' => 'Permite crear nuevos permisos'],
            ['nombre' => 'Editar permisos', 'descripcion' => 'Permite modificar permisos existentes'],
            ['nombre' => 'Eliminar permisos', 'descripcion' => 'Permite eliminar permisos existentes'],
            
            // Empleados
            ['nombre' => 'Ver empleados', 'descripcion' => 'Permite ver la lista de empleados'],
            ['nombre' => 'Crear empleados', 'descripcion' => 'Permite crear nuevos empleados'],
            ['nombre' => 'Editar empleados', 'descripcion' => 'Permite modificar empleados existentes'],
            ['nombre' => 'Eliminar empleados', 'descripcion' => 'Permite eliminar empleados existentes'],
            
            // Users
            ['nombre' => 'Ver usuarios', 'descripcion' => 'Permite ver la lista de usuarios'],
            ['nombre' => 'Crear usuarios', 'descripcion' => 'Permite crear nuevos usuarios'],
            ['nombre' => 'Editar usuarios', 'descripcion' => 'Permite modificar usuarios existentes'],
            ['nombre' => 'Eliminar usuarios', 'descripcion' => 'Permite eliminar usuarios existentes'],
            ['nombre' => 'Cambiar contraseñas', 'descripcion' => 'Permite cambiar contraseñas de usuarios'],

            // blogs
            ['nombre' => 'Crear blogs', 'descripcion' => 'Permite crear contenido de blogs'],
            ['nombre' => 'Eliminar blogs', 'descripcion' => 'Permite eliminar contenido de blogs'],
            
            // tarjetas
            ['nombre' => 'Crear tarjetas', 'descripcion' => 'Permite crear tarjetas'],
            ['nombre' => 'Eliminar tarjetas', 'descripcion' => 'Permite eliminar tarjetas'],
        ];

        foreach ($permisos as $permiso) {
            Permiso::create([
                'nombre' => $permiso['nombre'],
                'slug' => Str::slug($permiso['nombre']),
                'descripcion' => $permiso['descripcion']
            ]);
        }

        $rolAdmin = Rol::where('nombre', 'administrador')->first();
        
        if ($rolAdmin) {
            $todosLosPermisos = Permiso::all()->pluck('id_permiso')->toArray();
            $rolAdmin->permisos()->sync($todosLosPermisos);
        }
    }

}
    