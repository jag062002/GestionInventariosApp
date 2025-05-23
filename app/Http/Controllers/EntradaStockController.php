<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Requests\StoreEntradaStockRequest;
use App\Models\EntradaStock;

class EntradaStockController extends Controller
{
    public function index()
    {
        $entradas_stock = EntradaStock::with(['producto.categoria', 'producto.proveedor'])->get();
        return view('entrada_stock/index', compact('entradas_stock'));
    }
    

    public function create()
    {
        $productos = Producto::all();
        return view('entrada_stock/create', compact('productos'));
    }

    public function store(StoreEntradaStockRequest $request)
    {
        EntradaStock::create([
            'producto_id' => $request->producto,
            'cantidad' => $request->cantidad,
            'fecha'       => date('Y-m-d'),
            'usuario_creacion' => 'admin'
        ]);

        return redirect()->route('entradasStock.index')->with('success', 'Entrada creada exitosamente.');
    }
}
