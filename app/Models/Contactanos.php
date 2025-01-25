<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactanos extends Model
{
    use HasFactory;

    // Tabla asociada
    protected $table = 'contactanos';

    // Columnas rellenables
    protected $fillable = [
        'nombre',
        'email',
        'numero',
        'mensaje',
        'estado',
    ];

    // Ocultar columnas al retornar JSON (opcional)
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
