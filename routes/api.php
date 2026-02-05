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
Route::post('/salva_ong', [OngController::class, 'salva_ong']);
Route::get('/ong/{id}', [OngController::class, 'exibe_ong']);
Route::get('/ongs', [OngController::class, 'todas_ongs']);
