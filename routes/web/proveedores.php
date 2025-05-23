<?php

use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/proveedor/create', [ProveedorController::class, 'create'])->name('proveedor.create');
Route::post('/proveedor/store', [ProveedorController::class, 'store'])->name('proveedor.store');
Route::get('/proveedor/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('proveedor.edit');
Route::put('/proveedor/{proveedor}/edit', [ProveedorController::class, 'update'])->name('proveedor.update');
Route::delete('/proveedor/{proveedor}/destroy', [ProveedorController::class, 'destroy'])->name('proveedor.destroy');
