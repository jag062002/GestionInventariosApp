<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizedMiddleware;


Route::get('/categorias', [CategoriaController::class, 'index'])
    ->name('categorias.index')
    ->middleware(AuthorizedMiddleware::class . ':Categorias.showCategorias');


Route::get('/categorias/create', [CategoriaController::class, 'create'])
    ->name('categorias.create')
    ->middleware(AuthorizedMiddleware::class . ':Categorias.createCategorias');
