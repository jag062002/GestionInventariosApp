<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
     // Nombre de la tabla (opcional si se llama 'productos')
     protected $table = 'productos';

     // Campos que se pueden asignar masivamente
     protected $fillable = [
         'categoria_id',
         'proveedor_id',
         'codigo',
         'nombre',
         'stock',
         'usuario_creacion',
         'usuario_actualizacion'
     ];

     // Si usas timestamps (created_at, updated_at)
     public $timestamps = true;

     // Relaciones
     public function categoria()
     {
         return $this->belongsTo(Categoria::class);
     }

     public function proveedor()
     {
         return $this->belongsTo(Proveedor::class);
     }

     public function EntradaStocks()
     {
         return $this->hasMany(EntradaStock::class);
     }
}
