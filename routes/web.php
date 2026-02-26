<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OngController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

/*
|--------------------------------------------------------------------------
| ------------------------  VIEWS (BLADE)  --------------------------------
|--------------------------------------------------------------------------
*/

Route::get('/ongs', [OngController::class, 'index'])->name('lista_ongs');

Route::get('/ongs/create', [OngController::class, 'create_view']);
Route::post('/ongs', [OngController::class, 'salva_ong'])->name('ongs.store');

Route::get('/ongs/{id}', [OngController::class, 'view_ong']);
Route::get('/ongs/{id}/edit', [OngController::class, 'alt']);
Route::get('/ongs/{id}/delete', [OngController::class, 'delete_view']);

Route::delete('/ongs/{id}', [OngController::class, 'destroy'])
    ->name('ong.destroy');

require __DIR__.'/auth.php';
