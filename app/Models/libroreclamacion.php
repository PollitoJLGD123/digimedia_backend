<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class libroreclamacion extends Model
{
    protected $table = 'reclamaciones';
    protected $primaryKey = 'id_reclamacion';
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
        'aceptaPoliticaPrivacidad',
        'fechaReclamo',
        'fechaIncidente',
        'estadoReclamo',
    ];
    public $timestamps = false;
}
