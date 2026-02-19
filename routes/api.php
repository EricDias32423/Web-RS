<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OngController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Testes
Route::get('/test', [OngController::class, 'envia_test']);

// ONG
Route::get('/ongs', [OngController::class, 'todas_ongs']);
Route::get('/ongs/{id}', [OngController::class, 'exibe_ong']);
Route::post('/ongs', [OngController::class, 'salva_ong']);
Route::put('/ongs/{id}', [OngController::class, 'atualizar_ong']);
Route::delete('/ongs/{id}', [OngController::class, 'deletar_ong']);

