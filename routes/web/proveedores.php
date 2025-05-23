<?php

use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizedMiddleware;

Route::get('/proveedores', [ProveedorController::class, 'index'])
    ->name('proveedores.index')->middleware(AuthorizedMiddleware::class . ':Proveedores.showProveedores');

Route::get('/proveedor/create', [ProveedorController::class, 'create'])
    ->name('proveedor.create')->middleware(AuthorizedMiddleware::class . ':Proveedores.createProveedores');

Route::post('/proveedor/store', [ProveedorController::class, 'store'])
    ->name('proveedor.store')->middleware(AuthorizedMiddleware::class . ':Proveedores.createProveedores');

Route::get('/proveedor/{proveedor}/edit', [ProveedorController::class, 'edit'])
    ->name('proveedor.edit')->middleware(AuthorizedMiddleware::class . ':Proveedores.updateProveedores');

Route::put('/proveedor/{proveedor}/edit', [ProveedorController::class, 'update'])
    ->name('proveedor.update')->middleware(AuthorizedMiddleware::class . ':Proveedores.updateProveedores');

Route::delete('/proveedor/{proveedor}/destroy', [ProveedorController::class, 'destroy'])
    ->name('proveedor.destroy')->middleware(AuthorizedMiddleware::class . ':Proveedores.deleteProveedores');

