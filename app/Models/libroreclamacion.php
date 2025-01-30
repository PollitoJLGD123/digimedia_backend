<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class libroreclamacion extends Model
{
    protected $table = 'libroreclamacion';

    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'numeroDocumento',
        'email',
        'celular',
        'direccion',
        'distrito',
        'ciudad',
        'tipoReclamo',
        'servicioContratado',
        'reclamoPerson',
        'checkReclamoForm',
        'aceptaPoliticaPrivacidad'
    ];

    public $timestamps = false;
}
//others