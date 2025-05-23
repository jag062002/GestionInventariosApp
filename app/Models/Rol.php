<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    // Nombre de la tabla (opcional si se llama 'productos')
    protected $table = 'rols';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'usuario_creacion',
        'usuario_actualizacion'
    ];

    // Si usas timestamps (created_at, updated_at)
    public $timestamps = true;


}
