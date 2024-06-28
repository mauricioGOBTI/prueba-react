<?php

use App\Http\Controllers\configuracion\UnidadController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'unidad'], function () {
    Route::get('/', [UnidadController::class, 'index'])->name('unidad.index');
    Route::post('/', [UnidadController::class, 'create'])->name('unidad.create');
});