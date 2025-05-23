<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categorias = DB::table('categorias')->pluck('id')->toArray();

        $proveedores = DB::table('proveedors')->pluck('id')->toArray();

        // Crear 20 productos de ejemplo
        for ($i = 1; $i <= 20; $i++) {
            DB::table('productos')->insert([
                'categoria_id' => fake()->randomElement($categorias),
                'proveedor_id' => fake()->randomElement($proveedores),
                'codigo' => strtoupper(Str::random(8)),
                'nombre' => 'Producto ' . $i,
                'stock' => rand(5, 100),
                'usuario_creacion' => 'admin',
                'usuario_actualizacion' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

