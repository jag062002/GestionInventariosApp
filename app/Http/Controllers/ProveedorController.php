<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;


class ProveedorController extends Controller
{
    // Mostrar la lista de todo y la lista
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
        $proveedores = Proveedor::where('nombre', 'like', "%$request->filter%")->paginate($request->records_per_page);

        //Muestro la vista
        return view('proveedor.index', ['proveedores' => $proveedores, 'data' => $request]);
    }

    // Mostrar el formulario para crear
    public function create()
    {
        return view('proveedor.create'); // Solo muestra la vista
    }

    // Crear
    public function store(StoreProveedorRequest $request)
    {
        try {

            // Crear
            Proveedor::create([
                'nombre' => $request->nombre,
                'usuario_creacion' => 'admin',
                'usuario_actualizacion' => 'admin'
            ]);

            return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');

        } catch (\Exception $e) {

            return redirect()->route('proveedores.index')->with('error', 'Ocurrió un error al crear el proveedor.');
        }
    }

    // Visa actualizar
    public function edit(Proveedor $proveedor)
    {
        return view('proveedor.edit', compact('proveedor'))->with('isEdit', true);
    }

    // Actualizar
    public function update(UpdateProveedorRequest $request, Proveedor $proveedor)
    {
        try {

            // Actualizar con los datos validados
            $proveedor->update([
                'nombre' => $request->nombre,
                'usuario_actualizacion' => 'admin'
            ]);

            return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');

        } catch (\Exception $e) {

            return redirect()->route('proveedores.index')->with('error', 'Ocurrió un error al actualizar el proveedor.');
        }
    }

    //Eliminar
    public function destroy(Proveedor $proveedor)
    {
        try {

            $proveedor->delete();

            return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');

        } catch (\Exception $e) {

            return redirect()->route('proveedores.index')->with('error', 'Ocurrió un error al eliminar el Proveedor.');

        }
    }

}
