<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class libroreclamacion extends Model
{
    protected $table = 'reclamaciones';

    protected $fillable = [
        'id_reclamacion',
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
