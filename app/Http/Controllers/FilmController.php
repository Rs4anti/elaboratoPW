<?php

namespace App\Http\Controllers;
use App\Models\DataLayer;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(){
        $dl = new DataLayer();
        $films = $dl->listFilms();

        return view('film.films')->with('films_list', $films);
    }

    public function show(string $id){
        $dl = new DataLayer();
        $film = $dl->findFilmById($id);

        if($film !== null){
            return view('film.details')->with('film', $film);
        }else{
            return view('errors.404'); //->with('messagge', 'FILM ID SBAGLIATO!')
        }
    }

    public function edit(String $id){
        $dl = new DataLayer();

        $registi = $dl->listRegisti();
        $film = $dl->findFilmById($id);
        $generi = $dl->listGeneri();
        $linguaAudio = $dl -> lingueAudioFilm($id);
        $sottotitoli = $dl -> lingueSubFilm($id);

        if($film !== null){
            //VIEW per modifica $film
            return view('film.editFilm')
                        ->with('film', $film)
                        ->with('registi', $registi)
                        ->with('generi', $generi)
                        ->with('audio', $linguaAudio)
                        ->with('sottotitoli', $sottotitoli);
        } else{
            //VIEW di errore se $id errato! 
        }
    }
}
