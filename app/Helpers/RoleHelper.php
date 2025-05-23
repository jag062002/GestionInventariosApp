<?php

namespace App\Helpers;

use App\Models\Permisos;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RoleHelper {


    public static function currentUserIsAdmin() {

        try {

            return Auth::user()->rol_id == 1;

        } catch (\Exception $ex) {

            dd($ex);
        }
    }

    // ej: $permission = module.permission
    public static function isAuthorized($permission) {

        try {

            if (!Auth::check()) {

                return false;
            }

            if (RoleHelper::currentUserIsAdmin()) {

                return true;
            }

            $userId = Auth::user()->id;
            //$userId = 1;
            $obj = explode('.', $permission);
            $module = $obj[0];
            $permissionName = $obj[1];

            $permissionId = Permisos::select('permisos.id')
                                      ->join('role_permissions', 'permisos.id', 'role_permissions.permiso_id')
                                      ->join('rols', 'role_permissions.rol_id', 'rols.id')
                                      ->join('users', 'rols.id', 'users.rol_id')
                                      ->where('permisos.modulo', '=', $module)
                                      ->where('permisos.nombre', '=', $permissionName)
                                      ->where('users.id', '=', $userId)
                                      ->first();

            return $permissionId != null;


        } catch (\Exception $ex) {

            dd($ex);
        }
    }


}
