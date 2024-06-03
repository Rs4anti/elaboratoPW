<?php

namespace App\Http\Controllers;
use App\Models\DataLayer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FilmController extends Controller
{
    public function index(){
        $dl = new DataLayer();
        $films = $dl->listFilms();

        return view('film.films')->with('films_list', $films);
    }

    public function create(){
        $dl = new DataLayer();
        $listaRegisti = $dl->listRegisti();
        $generi = $dl->listGeneri();

        return view('film.editFilm')->with('registi', $listaRegisti)->with('generi', $generi);
    }

    public function store(Request $request){

        //TODO: Gestire validazione request?
        $generiSelezionati = $request->input('generi', []);
        $registiScelti = $request->input('registi', []);

        $dl = new DataLayer();

        $dl->addFilm($request->input('titolo'), 
                    $request->input('anno_uscita'), 
                    $request->input('trama'),
                    $request->input('durata'),
                    $generiSelezionati,
                    $registiScelti);

        return Redirect::to(route('film.index'));
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
            return view('errors.404'); //->with('messagge', 'FILM ID SBAGLIATO!')
        }
    }

    public function update(Request $request, string $id){

        $generiSelezionati = $request->input('generi', []);
        $registiSelezionati = $request->input('registi', []);

        $dl = new DataLayer();

        $dl->editFilm($id, $request->input('titolo'), $request->input('anno_uscita'), $request->input('trama'),
                        $request->input('durata'), $registiSelezionati, $generiSelezionati);
        
        return Redirect::to(route('film.index'));
        
    }
}
