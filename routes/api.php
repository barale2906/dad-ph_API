<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Ruta pública para login
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Rutas para gestionar Unidades Privadas
    Route::apiResource('properties', PropertyController::class);

    // Rutas para gestionar Propietarios y Residentes
    Route::apiResource('users', UserController::class);

    // Rutas para gestionar Documentos
    Route::apiResource('documents', DocumentController::class);

    // Rutas para gestionar Proveedores
    Route::apiResource('providers', ProviderController::class);

    // Más rutas para proveedores, documentos, etc.
});
