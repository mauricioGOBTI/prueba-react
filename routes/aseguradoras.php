<?php

use App\Http\Controllers\configuracion\AseguradoraController;
use App\Http\Controllers\configuracion\ClienteController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'aseguradora'], function () {
    Route::get('/', [AseguradoraController::class, 'index'])->name('aseguradora.index');
    Route::post('/', [AseguradoraController::class, 'create'])->name('aseguradora.create');
});