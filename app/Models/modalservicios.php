<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModalServicios extends Model
{
    protected $table = 'modalservicios';

    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'id_servicio'
    ];

    protected $dates = ['fecha_registro'];

    /**
     * Relación con servicios
     */
    public function servicio(): BelongsTo
    {
        return $this->belongsTo(Servicios::class, 'id_servicio', 'id');
    }
}