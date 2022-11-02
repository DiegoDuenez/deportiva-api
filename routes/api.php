<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalidadController;

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
});
