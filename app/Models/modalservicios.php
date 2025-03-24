<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class modalservicios extends Model
{
    protected $table = 'modalservicios';
    protected $primaryKey = 'id_modalservicio';

    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'id_servicio',
        'fecha',
        'estado'
    ];

    public $timestamps = false;

    public function servicio(): BelongsTo
    {
        return $this->belongsTo(servicios::class, 'id_servicio');
    }
}
