<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.show');
Route::post('/restaurants', [RestaurantController::class, 'store'])->name('restaurants.store');
Route::put('/restaurants/{id}', [RestaurantController::class, 'update'])->name('restaurants.update');
Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy'])->name('restaurants.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('productos.index');
Route::post('/products', [ProductController::class, 'store'])->name('productos.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('productos.show');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('productos.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('productos.destroy');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/login', [UserController::class, 'login'])->name('login');





