@include('producto.form', [
    'producto' => null,
    'categorias' => $categorias,
    'proveedores' => $proveedores,
    'route' => route('productos.store'),
    'isEdit' => false
])
