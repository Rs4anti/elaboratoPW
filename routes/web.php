<?php

use App\Http\Controllers\GardenController;
use App\Http\Controllers\IrideController;
use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'getHome'])->name('home');

Route::resource('price', PriceController::class);

Route::resource('garden', GardenController::class);

Route::resource('iride', IrideController::class);