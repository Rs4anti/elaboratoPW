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
use App\Http\Controllers\AuthController;

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
Route::get('/prorgammazione/{id}/destroy/confirm', [ProgrammazioneController::class, 'confirmDestroy'])->name('programmazione.destroy.confirm');

//Rotte ajax
Route::get('/ajaxDirector', [RegistaController::class, 'ajaxCheckRegista']);
Route::get('/ajaxFilm', [FilmController::class, 'ajaxCheckFilm']);


Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::post('/user/register', [AuthController::class, 'registration'])->name('user.register');
Route::get('/ajaxUser', [AuthController::class, 'ajaxCheckForEmail']);

Route::group(['middleware' => ['authCustom','isRegisteredUser']], function() {
    //qua farei metodi di Film per consentire a utente di aggiungere film che gli interessano da catalogo
    /* Route::resource('book', BookController::class);
    Route::get('/book/{id}/destroy/confirm', [BookController::class, 'confirmDestroy'])->name('book.destroy.confirm'); */

    //qua farei metodi di Film per consentire a utente di aggiungere proiezioni che gli interessano da quelle disponibili
    /* Route::resource('author', AuthorController::class);
    Route::get('/author/{id}/destroy/confirm', [AuthorController::class, 'confirmDestroy'])->name('author.destroy.confirm'); */

    Route::get('/ajaxDirector', [RegistaController::class, 'ajaxCheckRegista']);
    Route::get('/ajaxFilm', [FilmController::class, 'ajaxCheckFilm']);
});
