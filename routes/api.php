<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OngController;
use App\Http\Controllers\AuthController;

// Teste
Route::get('/test', [OngController::class, 'envia_test']);

// ONG API
Route::get('/ongs', [OngController::class, 'todas_ongs']);
Route::get('/ongs/{id}', [OngController::class, 'exibe_ong']);
Route::post('/ongs', [OngController::class, 'salva_ong']);
Route::put('/ongs/{id}', [OngController::class, 'atualizar_ong']);
Route::delete('/ongs/{id}', [OngController::class, 'destroy']);

// Rotas públicas de autenticação
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas protegidas (requer autenticação)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
});