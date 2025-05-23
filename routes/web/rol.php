<?php

use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizedMiddleware;

Route::get('/roles', [RolController::class, 'index'])->name('roles.index')
->middleware(AuthorizedMiddleware::class . ':Rol.showRols');

Route::get('/roles/create', [RolController::class, 'create'])->name('roles.create')
->middleware(AuthorizedMiddleware::class . ':Rol.createRols');

Route::post('/roles/store', [RolController::class, 'store'])->name('roles.store')
->middleware(AuthorizedMiddleware::class . ':Rol.createRols');

Route::get('/roles/{rol}/edit', [RolController::class, 'edit'])->name('roles.edit')
->middleware(AuthorizedMiddleware::class . ':Rol.updateRols');

Route::put('/roles/{rol}/edit', [RolController::class, 'update'])->name('roles.update')
->middleware(AuthorizedMiddleware::class . ':Rol.updateRols');

Route::delete('/roles/{rol}/destroy', [RolController::class, 'destroy'])->name('roles.destroy')
->middleware(AuthorizedMiddleware::class . ':Rol.deleteRols');
