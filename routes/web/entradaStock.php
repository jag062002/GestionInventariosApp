<?php

use App\Http\Controllers\EntradaStockController;
use Illuminate\Support\Facades\Route;

Route::get('/entradas-stock', [EntradaStockController::class, 'index'])->name('entradasStock.index');
Route::get('/entradas-stock/create', [EntradaStockController::class, 'create'])->name('entradasStock.create');
Route::post('/entradas-stock/store', [EntradaStockController::class, 'store'])->name('entradasStock.store');
