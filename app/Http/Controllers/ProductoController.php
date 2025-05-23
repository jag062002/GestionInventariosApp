<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
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

        //Filtro de busqueda
        $productos = Producto::with(['categoria', 'proveedor'])
        ->where('nombre', 'like', "%$request->filter%")
        ->paginate($request->records_per_page);

        //Muestro la vista
        return view('producto.index', ['productos' => $productos, 'data' => $request]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();

        return view('producto.create', compact('categorias', 'proveedores'));
    }

    public function store(StoreProductoRequest $request)
    {
        try {

            // Crear el producto
            Producto::create([
                'categoria_id' => $request->categoria,
                'proveedor_id' => $request->proveedor,
                'codigo'       => $request->codigo,
                'nombre'       => $request->nombre,
                'stock'        => $request->stock,
                'usuario_creacion' => 'admin',
                'usuario_actualizacion' => 'admin'
            ]);

            return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
        } catch (\Exception $e) {

            return redirect()->route('productos.index')->with('error', 'Ocurrió un error al crear el producto.');
        }
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();

        return view('producto.edit', compact('producto', 'categorias', 'proveedores'))->with('isEdit', true);
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        try {

            // Actualizar con los datos validados
            $producto->update([
                'categoria_id' => $request->categoria,
                'proveedor_id' => $request->proveedor,
                'codigo' => $request->codigo,
                'nombre' => $request->nombre,
                'stock' => $request->stock,
                'usuario_actualizacion' => 'admin'
            ]);

            return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
        } catch (\Exception $e) {

            return redirect()->route('productos.index')->with('error', 'Ocurrió un error al actualizar el producto.');
        }
    }

    public function destroy(Producto $producto)
    {
        try {

            $producto->delete();

            return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
        } catch (\Exception $e) {

            return redirect()->route('productos.index')->with('error', 'Ocurrió un error al eliminar el producto.');
        }
    }
}
