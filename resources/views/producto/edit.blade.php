@include('producto.form', [
    'producto' => $producto,
    'categorias' => $categorias,
    'proveedores' => $proveedores,
    'route' => route('productos.update', $producto),
    'isEdit' => true
])
