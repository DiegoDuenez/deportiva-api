<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ActividadController;





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
 * Usuario
 * 
 */
Route::controller(UserController::class)->group(function () {
    Route::get('usuarios', 'index');
    Route::middleware('auth:sanctum')->get('usuarios/{id}', 'show');
    Route::post('usuarios', 'store');
    Route::post('login', 'login');
    Route::middleware('auth:sanctum')->put('usuarios/{id}', 'update');
    Route::middleware('auth:sanctum')->delete('usuarios/{id}', 'destroy');
    Route::middleware('auth:sanctum')->delete('logout', 'logout');
});



/**
 * Localidad
 * 
 */
Route::controller(LocalidadController::class)->group(function () {
    Route::middleware('auth:sanctum')->get('localidades', 'index');
    Route::middleware('auth:sanctum')->get('localidades/{id}', 'show');
    Route::middleware('auth:sanctum')->post('localidades', 'store');
    Route::middleware('auth:sanctum')->put('localidades/{id}', 'update');
    Route::middleware('auth:sanctum')->delete('localidades/{id}', 'destroy');
});



/**
 * Persona
 * 
 */
Route::controller(PersonaController::class)->group(function () {
    Route::middleware('auth:sanctum')->get('personas', 'index');
    Route::middleware('auth:sanctum')->get('personas/{id}', 'show');
    Route::middleware('auth:sanctum')->post('personas', 'store');
    Route::middleware('auth:sanctum')->put('personas/{id}', 'update');
    Route::middleware('auth:sanctum')->delete('personas/{id}', 'destroy');
});



/**
 * Membresia
 * 
 */
Route::controller(MembresiaController::class)->group(function () {
    Route::middleware('auth:sanctum')->get('membresias', 'index');
    Route::middleware('auth:sanctum')->get('membresias/{id}', 'show');
    Route::middleware('auth:sanctum')->post('membresias', 'store');
    Route::middleware('auth:sanctum')->put('membresias/{id}', 'update');
    Route::middleware('auth:sanctum')->delete('membresias/{id}', 'destroy');
});



/**
 * Estado
 * 
 */
Route::controller(EstadoController::class)->group(function () {
    Route::middleware('auth:sanctum')->get('estados', 'index');
    Route::middleware('auth:sanctum')->get('estados/{id}', 'show');
    Route::middleware('auth:sanctum')->post('estados', 'store');
    Route::middleware('auth:sanctum')->put('estados/{id}', 'update');
    Route::middleware('auth:sanctum')->delete('estados/{id}', 'destroy');
});



/**
 * Municipio
 * 
 */
Route::controller(MunicipioController::class)->group(function () {
    Route::middleware('auth:sanctum')->get('municipios', 'index');
    Route::middleware('auth:sanctum')->get('municipios/{id}', 'show');
    Route::middleware('auth:sanctum')->post('municipios', 'store');
    Route::middleware('auth:sanctum')->put('municipios/{id}', 'update');
    Route::middleware('auth:sanctum')->delete('municipios/{id}', 'destroy');
});



/**
 * Familia
 * 
 */
Route::controller(FamiliaController::class)->group(function () {
    Route::middleware('auth:sanctum')->get('familias', 'index');
    Route::middleware('auth:sanctum')->get('familias/{id}', 'show');
    Route::middleware('auth:sanctum')->post('familias', 'store');
    Route::middleware('auth:sanctum')->put('familias/{id}', 'update');
    Route::middleware('auth:sanctum')->delete('familias/{id}', 'destroy');
});



/**
 * Pago
 * 
 */
Route::controller(PagoController::class)->group(function () {
    Route::middleware('auth:sanctum')->get('pagos', 'index');
    Route::middleware('auth:sanctum')->get('pagos/{id}', 'show');
    Route::middleware('auth:sanctum')->post('pagos', 'store');
    Route::middleware('auth:sanctum')->put('pagos/{id}', 'update');
    Route::middleware('auth:sanctum')->delete('pagos/{id}', 'destroy');
});



/**
 * Actividad
 * 
 */
Route::controller(ActividadController::class)->group(function () {
    Route::middleware('auth:sanctum')->get('actividades', 'index');
    Route::middleware('auth:sanctum')->get('actividades/{id}', 'show');
    Route::middleware('auth:sanctum')->post('actividades', 'store');
    Route::middleware('auth:sanctum')->put('actividades/{id}', 'update');
    Route::middleware('auth:sanctum')->delete('actividades/{id}', 'destroy');
});