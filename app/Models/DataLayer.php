<?php

namespace App\Models;

class DataLayer
{
    public function listFilms(){
        $films = Film::orderBy('titolo', 'asc')->get();
        return $films;
    }

    public function listFilmsByYear(){
        $filmsByYear = Film::orderBy('anno_uscita', 'asc')->get();
        return $filmsByYear;
    }

    public function findFilmById($id){
        return Film::find($id);
    }

    public function listRegisti(){
        return Regista::orderBy('nome', 'asc')->orderBy('cognome', 'asc')->get();
    }

    public function findRegistaById($id){
        return Regista::find($id);
    }

    public function listGeneri(){
        return Genere::orderBy('nome', 'asc');
    }

    public function lingueFilm($filmId){
        $film = Film::find($filmId);

        if($film){
            return $film->lingueAudio();
        }
        else return null;
    }

    public function listLingue(){
        return Genere::orderBy('lingua', 'asc');
    }

    public function listProiezioni(){
        return Proiezione::orderBy('data', 'asc')->orderBy('ora', 'asc')->get();
    }

    //TODO: aggiungere altri function per proiezioni?
    //tipo find proiezione per film
    // find proiezione per film, data
    // find proiezione per film, data e ora

    public function findProiezioneById($id){
        return Proiezione::find($id);
    }

    public function findProiezioneByDate($date){
        return Proiezione::where( 'data', $date)->get();
        //se voglio solo la prima occorrenza
        //return Proiezione::where( 'data', $date)->first();
    }

    public function findProiezioneByDateAndTime($date, $time){
        return Proiezione::where( 'data', $date)->where('ora', $time)->get();
        //se voglio solo la prima occorrenza
        //return Proiezione::where( 'data', $date)->where('ora', $time)->first();
    }

}
