<?php

use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EquipoPokemonController;
use App\Http\Controllers\PokemonController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('entrenadores', EntrenadorController::class)
        ->only(['index', 'show', 'store']);

Route::resource('equipos', EquipoController::class)
        ->only(['index','store']);

Route::resource('equipos_pokemones', EquipoPokemonController::class)
        ->only(['index','store']);

Route::get('/import-pokemon', [PokemonController::class, 'importPokemonData']);
Route::get('/import-pokemon-list', [PokemonController::class, 'index']);


        