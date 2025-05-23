@include('entrada_stock.form', [
    'entradaStock' => null,
    'productos' => $productos,
    'route' => route('entradasStock.store'),
    'isEdit' => false
])
