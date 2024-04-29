<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\FoodController;

Route::get('/restaurantes', [RestauranteController::class, 'index'])->name('restaurantes.index');
Route::get('/restaurantes/{id}', [RestauranteController::class, 'show'])->name('restaurantes.show');
Route::post('/restaurantes', [RestauranteController::class, 'store'])->name('restaurantes.store');
Route::put('/restaurantes/{id}', [RestauranteController::class, 'update'])->name('restaurantes.update');
Route::delete('/restaurantes/{id}', [RestauranteController::class, 'destroy'])->name('restaurantes.destroy');


Route::get('/food', [FoodController::class, 'index'])->name('productos.index');
Route::post('/food', [FoodController::class, 'store'])->name('productos.store');




