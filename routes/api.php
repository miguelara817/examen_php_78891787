<?php

use App\Http\Controllers\AutController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamosController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("v1/autores", AutorController::class);
Route::apiResource("v1/libros", LibroController::class);
Route::apiResource("v1/clientes", ClienteController::class);
Route::apiResource("v1/prestamos", PrestamosController::class);
Route::get('/v1/cliLibrosVencidos', [ClienteController::class, 'cliLibrosVencidos']);
Route::get('/v1/preSemanaMes', [PrestamosController::class, 'preSemanaMes']);
// Route::put('/v1/registrarDevolucion', [PrestamosController::class, 'registrarDevolucion']);
