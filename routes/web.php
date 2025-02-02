<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokeAPIController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pokemon', [PokeAPIController::class, 'search']);