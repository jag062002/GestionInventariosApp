@include('rol.form', [
    'rol' => $rol,
    'route' => route('roles.update', $rol),
    'isEdit' => true,
    'modulos' => $modulos
])
