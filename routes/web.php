<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index')->middleware('auth');

require __DIR__.'/auth.php';

include('web/categorias.php');
include('web/productos.php');
include('web/entradaStock.php');
include('web/rol.php');
include('web/proveedores.php');
