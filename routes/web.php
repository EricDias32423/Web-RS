<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OngController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});



Route::view('/cadastrar_ong', 'cadastro_ong');
Route::get('/view_ong/{id_ong}', [OngController::class, 'view_ong']);


require __DIR__.'/auth.php';