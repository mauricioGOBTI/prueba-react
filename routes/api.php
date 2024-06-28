<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\CheckAuthenticate;
use Illuminate\Support\Facades\Route;

include 'users.php';
include 'clientes.php';
include 'aseguradoras.php';

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::get('user/auth', 'user')->middleware(CheckAuthenticate::class);
    Route::get('user/roles-and-permissions', 'getUserRoleAndPermissions')->middleware(CheckAuthenticate::class);
});
