<?php
use App\Http\Controllers\AnggotaPosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('anggota-pos', function () {
    return view('anggota-pos.index');
});

Route::get('/api/anggota-pos', [AnggotaPosController::class, 'index']);
Route::post('/api/anggota-pos', [AnggotaPosController::class, 'store']);
Route::get('/api/anggota-pos/{id}', [AnggotaPosController::class, 'show']);
Route::put('/api/anggota-pos/{id}', [AnggotaPosController::class, 'update']);
Route::delete('/api/anggota-pos/{id}', [AnggotaPosController::class, 'destroy']);