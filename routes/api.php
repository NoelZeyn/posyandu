<?php
use App\Http\Controllers\AnggotaPosController;
use Illuminate\Support\Facades\Route;

Route::resource('anggota-pos', AnggotaPosController::class);

Route::prefix('api')->group(function () {
    Route::get('/anggota-pos', [AnggotaPosController::class, 'index']);
    Route::post('/anggota-pos', [AnggotaPosController::class, 'store']);
    Route::get('/anggota-pos/{id}', [AnggotaPosController::class, 'show']);
    Route::put('/anggota-pos/{id}', [AnggotaPosController::class, 'update']);
    Route::delete('/anggota-pos/{id}', [AnggotaPosController::class, 'destroy']);
});
