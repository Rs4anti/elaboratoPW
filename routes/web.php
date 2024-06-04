<?php

use App\Http\Controllers\GardenProgrController;
use App\Http\Controllers\GardenRassegneController;
use App\Http\Controllers\IrideProgrController;
use App\Http\Controllers\IrideRassegneController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'getHome'])->name('home');

Route::resource('gardenProgrammazione', GardenProgrController::class);
Route::resource('gardenRassegne', GardenRassegneController::class);


Route::resource('irideProgrammazione', IrideProgrController::class);
Route::resource('irideRassegne', IrideRassegneController::class);

Route::resource('price', PriceController::class);

Route::resource('film', FilmController::class);