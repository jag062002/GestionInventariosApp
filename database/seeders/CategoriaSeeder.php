<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Computadoras',
            'Laptops',
            'Smartphones',
            'Tablets',
            'Accesorios',
            'Software',
            'Periféricos',
            'Redes',
            'Servidores',
            'Almacenamiento',
            'Componentes',
            'Cables',
            'Monitores',
            'Teclados',
            'Mouses',
            'Impresoras',
            'Conectividad',
            'Seguridad informática',
            'Domótica',
            'Gadgets'
        ];

        foreach ($categorias as $nombre) {
            DB::table('categorias')->insert([
                'nombre' => $nombre,
                'usuario_creacion' => 'admin',
                'usuario_actualizacion' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
