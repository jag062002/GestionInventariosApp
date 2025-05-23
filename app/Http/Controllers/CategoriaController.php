<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        //Filtro de busqueda
        $categorias = Categoria::paginate(5);

        //Muestro la vista
        return view('categoria/index', ['categorias' => $categorias, 'data' => $request]);
    }

    public function create()
    {
        return view('categoria/create');
    }
}
