<?php

use App\Http\Controllers\GardenProgrController;
use App\Http\Controllers\GardenRassegneController;
use App\Http\Controllers\IrideProgrController;
use App\Http\Controllers\IrideRassegneController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProgrammazioneController;
use App\Http\Controllers\RegistaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MostraFilmController;

Route::get('/', [FrontController::class, 'getHome'])->name('home');

Route::resource('gardenProgrammazione', GardenProgrController::class);
Route::resource('irideProgrammazione', IrideProgrController::class);

Route::resource('gardenRassegne', GardenRassegneController::class);
Route::resource('irideRassegne', IrideRassegneController::class);

Route::resource('mostraFilm', MostraFilmController::class);

Route::resource('price', PriceController::class);

Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::post('/user/register', [AuthController::class, 'registration'])->name('user.register');
Route::get('/ajaxUser', [AuthController::class, 'ajaxCheckForEmail']);


// Gruppo di rotte per utenti registrati
Route::group(['middleware' => ['authCustom', 'isRegisteredUser']], function() {
    Route::get('/preferenzeUtente', [UserController::class, 'index'])->name('preferenzeUtente');
    Route::get('/suggerimenti', [UserController::class, 'suggerimenti'])->name('suggerimentiUtente');
    Route::get('/preferenzeUtente', [UserController::class, 'index'])->name('preferenzeUtente');
    Route::post('/preferenzeUtente', [UserController::class, 'store'])->name('preferenze.store');
    Route::put('/preferenzeUtente', [UserController::class, 'update'])->name('preferenze.update');
});


Route::group(['middleware' => ['authCustom','isAdmin']], function() {
    
    
    Route::get('/film/{id}/destroy/confirm', [FilmController::class, 'confirmDestroy'])->name('film.destroy.confirm');
    Route::resource('regista', RegistaController::class)->parameters([
        'regista' => 'id'
    ]);
    Route::get('/regista/{id}/destroy/confirm', [RegistaController::class, 'confirmDestroy'])->name('regista.destroy.confirm');
    Route::resource('film', FilmController::class);
    //Route::get('film/{id}', [FilmController::class, 'create'])->name('film.create');
    Route::resource('programmazione', ProgrammazioneController::class);
    Route::get('/programmazione/create/{id}', [ProgrammazioneController::class, 'create'])->name('programmazione.create');
    Route::post('programmazione/create/{id}', [ProgrammazioneController::class, 'store'])->name('proiezioni.store');
    Route::get('/prorgammazione/{id}/destroy/confirm', [ProgrammazioneController::class, 'confirmDestroy'])->name('programmazione.destroy.confirm');
   
    //Rotte ajax
    Route::get('/ajaxDirector', [RegistaController::class, 'ajaxCheckRegista']);
    Route::get('/ajaxFilm', [FilmController::class, 'ajaxCheckFilm']);
});

Route::fallback(function () {
    return view('errors.404')->with('message','Error 404 - Page not found!');
});