<?php

use App\Http\Controllers\EntradaStockController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizedMiddleware;

Route::get('/entradas-stock', [EntradaStockController::class, 'index'])
    ->name('entradasStock.index')->middleware(AuthorizedMiddleware::class . ':Entradas Stock.showEntradasStock');

Route::get('/entradas-stock/create', [EntradaStockController::class, 'create'])
    ->name('entradasStock.create')->middleware(AuthorizedMiddleware::class . ':Entradas Stock.createEntradasStock');

Route::post('/entradas-stock/store', [EntradaStockController::class, 'store'])
    ->name('entradasStock.store')->middleware(AuthorizedMiddleware::class . ':Entradas Stock.createEntradasStock');

