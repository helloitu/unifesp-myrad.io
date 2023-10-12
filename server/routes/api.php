<?php

use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(ServiceController::class)->group(function () {
    //Lista configuração do MyRadio
    Route::get('service', 'index');

    //Votacao
    Route::get('service/abre_votacao', 'abre_votacao');
    Route::get('service/fecha_votacao', 'fecha_votacao');

    //Cadastros
    Route::get('service/abre_cadastros', 'abre_cadastros');
    Route::get('service/fecha_cadastros', 'fecha_cadastros');
});

Route::apiResource('usuario', \App\Http\Controllers\Api\UsuarioController::class);

Route::apiResource('artista', \App\Http\Controllers\Api\ArtistaController::class);
Route::apiResource('artista.musica', \App\Http\Controllers\Api\MusicaController::class);