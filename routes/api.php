<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestauranteController;

Route::get('/restaurantes', [RestauranteController::class, 'index'])->name('restaurantes.index');
Route::get('/restaurantes/{id}', [RestauranteController::class, 'show'])->name('restaurantes.show');
Route::post('/restaurantes', [RestauranteController::class, 'store'])->name('restaurantes.store');
Route::put('/restaurantes/{id}', [RestauranteController::class, 'update'])->name('restaurantes.update');
Route::delete('/restaurantes/{id}', [RestauranteController::class, 'destroy'])->name('restaurantes.destroy');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
