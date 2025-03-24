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
        'id_servicio',
        'reclamoPerson',
        'checkReclamoForm',
        'aceptaPoliticaPrivacidad',
        'fechaReclamo',
        'fechaIncidente',
        'estadoReclamo',
    ];
    public $timestamps = false;

    public function servicio(){
        return $this->hasOne(servicios::class, 'id_servicio','id_servicio');
    }
}
