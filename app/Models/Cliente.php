<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'departamento_id',
        'ciudad_id',
        'celular',
        'correo',
        'terminos',
        'created_at'
    ];
}
