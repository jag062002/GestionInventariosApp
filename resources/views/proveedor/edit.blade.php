@include('proveedor.form', [
    'proveedor' => $proveedor,
    'route' => route('proveedor.update', $proveedor),
    'isEdit' => true
])
