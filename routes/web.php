<?php

use App\Http\Controllers\GardenProgrController;
use App\Http\Controllers\GardenRassegneController;
use App\Http\Controllers\IrideProgrController;
use App\Http\Controllers\IrideRassegneController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProgrammazioneController;
use App\Http\Controllers\RegistaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'getHome'])->name('home');

Route::resource('gardenProgrammazione', GardenProgrController::class);
Route::resource('irideProgrammazione', IrideProgrController::class);

Route::resource('programmazione', ProgrammazioneController::class);
Route::get('/programmazione/create/{id}', [ProgrammazioneController::class, 'create'])->name('programmazione.create');


Route::resource('gardenRassegne', GardenRassegneController::class);
Route::resource('irideRassegne', IrideRassegneController::class);

Route::resource('price', PriceController::class);

Route::resource('film', FilmController::class);
Route::get('/film/{id}/destroy/confirm', [FilmController::class, 'confirmDestroy'])->name('film.destroy.confirm');



Route::resource('regista', RegistaController::class)->parameters([
    'regista' => 'id'
]);
Route::get('/regista/{id}/destroy/confirm', [RegistaController::class, 'confirmDestroy'])->name('regista.destroy.confirm');

Route::post('programmazione/create/{id}', [ProgrammazioneController::class, 'store'])->name('proiezioni.store');
