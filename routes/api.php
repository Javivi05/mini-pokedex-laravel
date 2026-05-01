<?php

use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\PokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Entrenadores (CRUD)
Route::get('entrenador', [EntrenadorController::class, 'index']);          // Listar
Route::post('entrenador', [EntrenadorController::class, 'store']);         // Crear
Route::put('entrenador/{id}', [EntrenadorController::class, 'update']);    // Actualizar
Route::patch('entrenador/{id}', [EntrenadorController::class, 'update']);  // Actualizar parcial
Route::delete('entrenador/{id}', [EntrenadorController::class, 'destroy']); // Eliminar

// Pokemon (CRUD)
Route::get('pokemon', [PokemonController::class, 'index']);               // Listar
Route::post('pokemon', [PokemonController::class, 'store']);              // Crear
Route::put('pokemon/{id}', [PokemonController::class, 'update']);         // Actualizar
Route::patch('pokemon/{id}', [PokemonController::class, 'update']);       // Actualizar parcial
Route::delete('pokemon/{id}', [PokemonController::class, 'destroy']);     // Eliminar