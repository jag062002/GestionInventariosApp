<?php

namespace Database\Seeders;

use App\Models\Permisos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            // Proveedores
            ['nombre' => 'showProveedores', 'descripcion' => 'Ver Proveedores', 'modulo' => 'Proveedores'],
            ['nombre' => 'createProveedores', 'descripcion' => 'Crear Proveedores', 'modulo' => 'Proveedores'],
            ['nombre' => 'updateProveedores', 'descripcion' => 'Actualizar Proveedores', 'modulo' => 'Proveedores'],
            ['nombre' => 'deleteProveedores', 'descripcion' => 'Eliminar Proveedores', 'modulo' => 'Proveedores'],

            // Categorias
            ['nombre' => 'showCategorias', 'descripcion' => 'Ver Categorias', 'modulo' => 'Categorias'],
            ['nombre' => 'createCategorias', 'descripcion' => 'Crear Categorias', 'modulo' => 'Categorias'],
            ['nombre' => 'updateCategorias', 'descripcion' => 'Actualizar Categorias', 'modulo' => 'Categorias'],
            ['nombre' => 'deleteCategorias', 'descripcion' => 'Eliminar Categorias', 'modulo' => 'Categorias'],

            // Productos
            ['nombre' => 'showProductos', 'descripcion' => 'Ver Productos', 'modulo' => 'Productos'],
            ['nombre' => 'createProductos', 'descripcion' => 'Crear Productos', 'modulo' => 'Productos'],
            ['nombre' => 'updateProductos', 'descripcion' => 'Actualizar Productos', 'modulo' => 'Productos'],
            ['nombre' => 'deleteProductos', 'descripcion' => 'Eliminar Productos', 'modulo' => 'Productos'],

            // Entradas Stock
            ['nombre' => 'showEntradasStock', 'descripcion' => 'Ver Entradas Stock', 'modulo' => 'Entradas Stock'],
            ['nombre' => 'createEntradasStock', 'descripcion' => 'Crear Entradas Stock', 'modulo' => 'Entradas Stock'],
            ['nombre' => 'updateEntradasStock', 'descripcion' => 'Actualizar Entradas Stock', 'modulo' => 'Entradas Stock'],
            ['nombre' => 'deleteEntradasStock', 'descripcion' => 'Eliminar Entradas Stock', 'modulo' => 'Entradas Stock'],

            // Entradas Stock
            ['nombre' => 'showRols', 'descripcion' => 'Ver Roles', 'modulo' => 'Rol'],
            ['nombre' => 'createRols', 'descripcion' => 'Crear Rol', 'modulo' => 'Rol'],
            ['nombre' => 'updateRols', 'descripcion' => 'Actualizar Rol', 'modulo' => 'Rol'],
            ['nombre' => 'deleteRols', 'descripcion' => 'Eliminar Rol', 'modulo' => 'Rol'],

        ];

        foreach ($permissions as $permission) {

            $tmpPermission = Permisos::where('nombre', '=', $permission['nombre'])
                ->where('modulo', '=', $permission['modulo'])
                ->first();

            if (empty($tmpPermission)) {

                $newPermission = new Permisos();
                $newPermission->nombre = $permission['nombre'];
                $newPermission->descripcion = $permission['descripcion'];
                $newPermission->modulo = $permission['modulo'];
                $newPermission->save();
            }
        }
    }
}
