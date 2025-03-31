<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cloudinary\Cloudinary;
class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    public $timestamps = false;
    
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'dni',
        'telefono',
        'imagen_perfil',
        'imagen_perfil_url',
        'id_user',
        'id_rol',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }

    public function getImagenPerfilUrlAttribute()
    {
        if ($this->imagen_perfil) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
                'url' => [
                    'secure' => true
                ]
            ]);
            
            return $cloudinary->image($this->imagen_perfil)->toUrl();
        }
        return asset('images/default-profile.jpg');
    }
}
