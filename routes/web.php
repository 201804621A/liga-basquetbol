<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;

Route::redirect('/', '/equipos');

// Rutas para visitantes
Route::middleware('guest')->group(function () {
    Route::get('/registro', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/registro', [AuthController::class, 'register'])
        ->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});

// Rutas para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('equipos', EquipoController::class)
        ->except(['show']);

    Route::resource('jugadores', JugadorController::class)
        ->except(['show']);

    Route::resource('partidos', PartidoController::class)
        ->except(['show']);
});
