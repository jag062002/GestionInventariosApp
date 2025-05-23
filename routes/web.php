<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

include('web/categorias.php');
include('web/productos.php');
include('web/entradaStock.php');
include('web/rol.php');
include('web/proveedores.php');
