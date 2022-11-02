<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;





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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Localidad
 * 
 */
Route::controller(LocalidadController::class)->group(function () {
    Route::get('localidades', 'index');
    Route::get('localidades/{id}', 'show');
    Route::post('localidades', 'store');
    Route::put('localidades/{id}', 'update');
    Route::delete('localidades/{id}', 'destroy');
});



/**
 * Persona
 * 
 */
Route::controller(PersonaController::class)->group(function () {
    Route::get('personas', 'index');
    Route::get('personas/{id}', 'show');
    Route::post('personas', 'store');
    Route::put('personas/{id}', 'update');
    Route::delete('personas/{id}', 'destroy');
});



/**
 * Membresia
 * 
 */
Route::controller(MembresiaController::class)->group(function () {
    Route::get('membresias', 'index');
    Route::get('membresias/{id}', 'show');
    Route::post('membresias', 'store');
    Route::put('membresias/{id}', 'update');
    Route::delete('membresias/{id}', 'destroy');
});



/**
 * Estado
 * 
 */
Route::controller(EstadoController::class)->group(function () {
    Route::get('estados', 'index');
    Route::get('estados/{id}', 'show');
    Route::post('estados', 'store');
    Route::put('estados/{id}', 'update');
    Route::delete('estados/{id}', 'destroy');
});



/**
 * Municipio
 * 
 */
Route::controller(MunicipioController::class)->group(function () {
    Route::get('municipios', 'index');
    Route::get('municipios/{id}', 'show');
    Route::post('municipios', 'store');
    Route::put('municipios/{id}', 'update');
    Route::delete('municipios/{id}', 'destroy');
});