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

    public function locandinaFilm($filmId){
        $film = Film::find($filmId);

        if($film){
            return $film->locandinaFilm();
        }else{
            return null;
        }
    }

    public function addFilm($titolo, $annoUscita, $trama, $durata, $registi, $generi){
            $film = new Film;
            $film->titolo = $titolo;
            $film->anno_uscita = $annoUscita;
            $film->durata = $durata;
            $film->trama = $trama;

            $film->save();

            foreach($registi as $regista){
                $film->registi()->attach($regista);
            }

            foreach($generi as $genere){
                $film->generi()->attach($genere);
            }

    }

    public function editFilm($id, $titolo, $annoUscita, $trama, $durata, $registi, $generi){
        $film = Film::find($id);

        $film->titolo = $titolo;
        $film->anno_uscita = $annoUscita;
        $film->durata = $durata;
        $film->trama = $trama;

        $film->save();

        //cancello la lista di registi
        $prevRegisti = $film->registi;
        foreach($prevRegisti as $prevRegista){
            $film->registi()->detach($prevRegista->id);
        }

        //aggiorno la lista di registi
        foreach($registi as $regista){
            $film->registi()->attach($regista);
        }

        //cancello i generi associati al film
        $prevGeneri = $film->generi;
        foreach($prevGeneri as $prevGenere){
            $film->generi()->detach($prevGenere->id);
        }

        //aggiorno la lista di generi del film
        foreach($generi as $genere){
            $film->generi()->attach($genere);
        }

    }

    //add regista

    //edit regista

    public function listRegisti(){
        return Regista::orderBy('nome', 'asc')->orderBy('cognome', 'asc')->get();
    }

    public function findRegistaById($id){
        return Regista::find($id);
    }

    public function listGeneri(){
        return Genere::orderBy('nome', 'asc')->get();
    }

    public function lingueAudioFilm($filmId){
        $film = Film::find($filmId);

        if($film){
            return $film->lingueAudio();
        }
        else return null;
    }

    public function lingueSubFilm($filmId){
        $film = Film::find($filmId);

        if($film){
            return $film->sottotitoli();
        }
        else return null;
    }

    public function listLingue(){
        return Genere::orderBy('lingua', 'asc');
    }

    public function listProiezioni(){
        return Proiezione::orderBy('data', 'asc')->orderBy('ora', 'asc')->get();
    }

    public function findRegistaFilm($filmId){
        $film = Film::find($filmId);

        if($film){
            return $film->registi;
        }
        else null;
    }

    public function findFilmRegista($registaId){
        $regista = Regista::find($registaId);

        if($regista){
            return $regista->films;
        }
        else null;
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

    public function findProiezioniFilm($filmId){
        return Proiezione::where('film_id', $filmId)->orderBy('data', 'asc')->get();
    }

    public function findProiezioneFilmSala($filmId, $salaId){
        return Proiezione::where('film_id', $filmId)
                            ->where('sala_id', $salaId)
                            ->orderBy('data', 'asc')
                            ->orderBy('ora', 'asc')
                            ->get(); //->first(); se voglio solo prima occorennza
    }

    public function findProiezioneFilmCinema($filmId, $cinemaId){
        //CHECK se è giusta e serve
        return Proiezione::where('film_id', $filmId)
                ->whereHas('sala', function ($query)use ($cinemaId){
                    $query->where('cinema_id', $cinemaId);
                })
                ->get();
    }

    //trovare proiezioni di registi?


    

}
