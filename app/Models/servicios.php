<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicios extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public $timestamps = false;

    /**
     * Relación con modalservicios
     */
    public function modalservicios(): HasMany
    {
        return $this->hasMany(ModalServicios::class, 'servicio_id', 'id');
    }
}