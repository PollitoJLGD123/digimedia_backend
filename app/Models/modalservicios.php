<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class modalservicios extends Model
{
    protected $table = 'modalservicios';

    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'servicio_id'
    ];

    protected $dates = ['fecha_registro'];
    public $timestamps = false; 

    /**
     * Relación con servicios
     */
    public function servicio(): BelongsTo
    {
        return $this->belongsTo(Servicios::class, 'servicio_id');
    }
}