<?php

namespace App\Helpers;

use App\Models\Permisos;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RoleHelper {


    public static function currentUserIsAdmin() {

        try {

            $role = Auth::user()->role->name;

            return $role == 'Administrador';

        } catch (\Exception $ex) {

            dd($ex);
        }
    }

    // ej: $permission = module.permission
    public static function isAuthorized($permission) {

        try {

          /*  if (!Auth::check()) {

                return false;
            }

            if (RoleHelper::currentUserIsAdmin()) {

                return true;
            }

            //$userId = Auth::user()->id;
            $userId = 1;
            $obj = explode('.', $permission);
            $module = $obj[0];
            $permissionName = $obj[1];

            $permissionId = Permisos::select('permissions.id')
                                      ->join('role_permissions', 'permissions.id', 'role_permissions.permission_id')
                                      ->join('roles', 'role_permissions.role_id', 'roles.id')
                                      ->join('users', 'roles.id', 'users.role_id')
                                      ->where('permissions.module', '=', $module)
                                      ->where('permissions.name', '=', $permissionName)
                                      ->where('users.id', '=', $userId)
                                      ->first();

            return $permissionId != null;*/

            return true;

        } catch (\Exception $ex) {

            dd($ex);
        }
    }


}
