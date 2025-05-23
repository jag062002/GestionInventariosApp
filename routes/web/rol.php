<?php

use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;

Route::get('/roles', [RolController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RolController::class, 'create'])->name('roles.create');
Route::post('/roles/store', [RolController::class, 'store'])->name('roles.store');
Route::get('/roles/{rol}/edit', [RolController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{rol}/edit', [RolController::class, 'update'])->name('roles.update');
Route::delete('/roles/{rol}/destroy', [RolController::class, 'destroy'])->name('roles.destroy');
