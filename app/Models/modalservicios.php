<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class modalservicios extends Model
{
    protected $table = 'modalservicios';

    protected $fillable = [
        'id_modalservicio',
        'nombre',
        'telefono',
        'correo',
        'id_servicio'
    ];

    protected $dates = ['fecha_registro'];
    public $timestamps = false;

    public function servicio(): BelongsTo
    {
        return $this->belongsTo(Servicios::class, 'id_servicio');
    }
}
