<?php

namespace Database\Seeders;


use App\Models\Permisos;
use App\Models\Rol;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Admin
        $adminRole = new Rol();
        $adminRole->nombre = 'Administrador';
        $adminRole->usuario_creacion = 'Admin';
        $adminRole->usuario_actualizacion = 'Admin';
        $adminRole->save();

        //Proveedor Role
        $proveedorRole = new Rol();
        $proveedorRole->nombre = 'Gestor de proveedores';
        $proveedorRole->usuario_creacion = 'Admin';
        $proveedorRole->usuario_actualizacion = 'Admin';
        $proveedorRole->save();

        $proveedorPermissions = Permisos::where('modulo', '=', 'Proveedores')
                                     ->get();

        foreach($proveedorPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $proveedorRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        //Categorias Role
        $categoriaRole = new Rol();
        $categoriaRole->nombre = 'Gestor de Categorias';
        $categoriaRole->usuario_creacion = 'Admin';
        $categoriaRole->usuario_actualizacion = 'Admin';
        $categoriaRole->save();

        $categoriaPermissions = Permisos::where('modulo', '=', 'Categorias')
                                     ->get();

        foreach($categoriaPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $categoriaRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Productos Role
        $productosRole = new Rol();
        $productosRole->nombre = 'Encargado de los productos';
        $productosRole->usuario_creacion = 'Admin';
        $productosRole->usuario_actualizacion = 'Admin';
        $productosRole->save();

        $productoPermissions = Permisos::where('modulo', '=', 'Productos')
                                        ->get();

        foreach($productoPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $productosRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Stock Role
        $stockRole = new Rol();
        $stockRole->nombre = 'Encargado de stock';
        $stockRole->usuario_creacion = 'Admin';
        $stockRole->usuario_actualizacion = 'Admin';
        $stockRole->save();

        $stockPermissions = Permisos::where('modulo', '=', 'Entradas Stock')
                                        ->get();

        foreach($stockPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $stockRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Users

        $user = new User();
        $user->name ='Pepe';
        $user->last_name = 'Ortiz';
        $user->document_number = '12345678';
        $user->email = 'Pepe@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->rol_id = $adminRole->id;
        $user->save();

        $user = new User();
        $user->name = 'Ana';
        $user->last_name = 'Jimenez';
        $user->document_number = '23456789';
        $user->email = 'anad@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('2345');
        $user->rol_id = $categoriaRole->id;
        $user->save();

        $user = new User();
        $user->name = 'Andres';
        $user->last_name = 'Sabanales';
        $user->document_number = '34567890';
        $user->email = 'And@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('3456');
        $user->rol_id = $productosRole->id;
        $user->save();

        $user = new User();
        $user->name = 'Carlos';
        $user->last_name = 'Perez';
        $user->document_number = '45678901';
        $user->email = 'Carlitos@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('4567');
        $user->rol_id = $stockRole->id;
        $user->save();

        $user = new User();
        $user->name = 'Luisa';
        $user->last_name = 'Gallego';
        $user->document_number = '56789012';
        $user->email = 'Lu@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('5678');
        $user->rol_id = $proveedorRole->id;
        $user->save();
    }
}
