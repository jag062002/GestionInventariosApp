<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedores = [
            'TechWorld S.A.',
            'Soluciones Digitales SAS',
            'ProTecno LTDA',
            'Nova Tecnología',
            'GlobalTech Distribuciones'
        ];

        foreach ($proveedores as $nombre) {
            DB::table('proveedors')->insert([
                'nombre' => $nombre,
                'usuario_creacion' => 'admin',
                'usuario_actualizacion' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
