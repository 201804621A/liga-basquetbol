<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;

Route::redirect('/', '/equipos');

Route::resource('equipos', EquipoController::class)
    ->except(['show']);

Route::resource('jugadores', JugadorController::class)
    ->except(['show']);

Route::resource('partidos', PartidoController::class)
    ->except(['show']);