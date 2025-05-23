<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizedMiddleware;

Route::get('/productos', [ProductoController::class, 'index'])
    ->name('productos.index')->middleware(AuthorizedMiddleware::class . ':Productos.showProductos');

Route::get('/productos/create', [ProductoController::class, 'create'])
    ->name('productos.create')->middleware(AuthorizedMiddleware::class . ':Productos.createProductos');

Route::post('/productos/store', [ProductoController::class, 'store'])
    ->name('productos.store')->middleware(AuthorizedMiddleware::class . ':Productos.createProductos');

Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])
    ->name('productos.edit')->middleware(AuthorizedMiddleware::class . ':Productos.updateProductos');

Route::put('/productos/{producto}/edit', [ProductoController::class, 'update'])
    ->name('productos.update')->middleware(AuthorizedMiddleware::class . ':Productos.updateProductos');

Route::delete('/productos/{producto}/destroy', [ProductoController::class, 'destroy'])
    ->name('productos.destroy')->middleware(AuthorizedMiddleware::class . ':Productos.deleteProductos');

