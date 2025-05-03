<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAction extends Model
{
    use HasFactory;

    protected $table = 'user_action';

    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario_id',
        'usuario_email',
        'ip',
        'metodo',
        'url',
        'datos',
        'user_agent'
    ];
}
