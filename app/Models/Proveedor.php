<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedors';

    protected $fillable = [
        'nombre',
        'usuario_creacion',
        'usuario_actualizacion',
    ];

    // Si usas timestamps (created_at, updated_at)
    public $timestamps = true;

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
