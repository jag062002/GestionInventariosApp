<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRolRequest;
use App\Http\Requests\UpdateRolRequest;
use App\Models\Permisos;
use App\Models\Rol;
use App\Models\RolePermission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RolController extends Controller
{
    public function index(Request $request)
    {
        //Validacion para la paginacion
        if (!empty($request->records_per_page)) {

            $request->records_per_page = $request->records_per_page <= env("PAGINATION_MAX_SIZE") ? $request->records_per_page
                : env("PAGINATION_MAX_SIZE");
        } else {

            $request->records_per_page = env("PAGINATION_DEFAULT_SIZE");
        }

        $roles = Rol::where('nombre', 'like', "%$request->filter%")
            ->paginate($request->records_per_page);

        return view('rol/index', compact('roles'));
    }

    public function create()
    {
        $modulos = Permisos::all()
            ->groupBy('modulo');

        return view('rol/create', [
            'modulos' => $modulos
        ]);
    }

    public function store(StoreRolRequest $request)
    {
        try {


            DB::transaction(function () use ($request) {

                // Creación de rol
                $role = new Rol();
                $role->nombre = $request->nombre;
                $role->usuario_creacion = "Admin";
                $role->usuario_actualizacion = "Admin";
                $role->save();

                // Permisos
                $permisos = json_decode($request->permisos);

                foreach ($permisos as $permiso) {

                    $rolePermission = new RolePermission();
                    $rolePermission->rol_id = $role->id;
                    $rolePermission->permiso_id = $permiso;
                    $rolePermission->save();
                }
            });

            return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
        } catch (\Exception $ex) {

            dd($ex);
            Log::error($ex);
            return redirect()->route('roles.index')->with('error', 'Ocurrió un error al crear el rol.');
        }
    }

    public function edit(Rol $rol)
    {
        $permisos = Permisos::all();
        $rol_id = $rol->id;

        $permisos = $permisos->map(function ($item) use ($rol_id) {

            $item->selected = false;

            $rolePermission = RolePermission::where('permiso_id', '=', $item->id)
                ->where('rol_id', '=', $rol_id)
                ->first();

            if (!empty($rolePermission)) {

                $item->selected = true;
            }

            return $item;
        });

        $modulos = $permisos->groupBy('modulo');

        return view('rol/edit', [
            'modulos' => $modulos,
            'rol' => $rol,
            'isEdit' => true
        ]);
    }

    public function update(UpdateRolRequest $request, Rol $rol)
    {

        try {

                DB::transaction(function() use($request, $rol) {

                // Creación de rol
                $role = Rol::find($rol->id);
                $role->nombre = $request->nombre;
                $role->save();

                // Permisos
                // Eliminación permisos antiguas
                RolePermission::where('rol_id', '=', $role->id)
                              ->delete();

                // Permisos
                $permisos = json_decode($request->permisos);

                foreach ($permisos as $permiso) {

                    $rolePermission = new RolePermission();
                    $rolePermission->rol_id = $role->id;
                    $rolePermission->permiso_id = $permiso;
                    $rolePermission->save();
                }
            });



            return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
        } catch (\Exception $ex) {

            dd($ex);
            Log::error($ex);
            return redirect()->route('roles.index')->with('error', 'Ocurrió un error al actualizar el rol.');
        }
    }

    public function destroy(Rol $rol)
    {
        try {

            $rol->delete();

            return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
        } catch (\Exception $e) {

            return redirect()->route('roles.index')->with('error', 'Ocurrió un error al eliminar el rol.');
        }
    }
}
