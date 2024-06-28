<?php

use App\Http\Controllers\configuracion\ClienteController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cliente'], function () {
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    Route::post('/', [ClienteController::class, 'create'])->name('cliente.create');
});