<?php

use Illuminate\Support\Facades\Route;
#SSH
Route::get('/', function () {
    return view('welcome');
});
