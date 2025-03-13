<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Relations\HasMany;

class servicios extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'id_servicio',
        'nombre',
        'descripcion'
    ];

    public $timestamps = false;

    /**
     * Relación con modalservicios
     */
    public function modalservicios(): HasMany
    {
        return $this->hasMany(ModalServicios::class, 'id_servicio', 'id_servicio');
    }
}
