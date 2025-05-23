<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntradaStock extends Model
{
    // Nombre de la tabla (opcional si se llama 'productos')
    protected $table = 'entrada_stocks';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'producto_id',
        'cantidad',
        'fecha',
        'usuario_creacion'
    ];

    // Si usas timestamps (created_at, updated_at)
    public $timestamps = true;

    // Relaciones
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
