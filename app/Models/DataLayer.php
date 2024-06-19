<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DataLayer
{
    public function listFilms(){
        $films = Film::orderBy('titolo', 'asc')->get();
        return $films;
    }

    public function locandine(){
        $locandine = Locandina::all();

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

    public function addFilm($titolo, $annoUscita,  $linkTrailer, $trama, $durata, $registi, $generi, $lingueAudio, $sottotitoli){
            $film = new Film;
            $film->titolo = $titolo;
            $film->anno_uscita = $annoUscita;
            $film->durata = $durata;
            $film->trama = $trama;
            $film->link_trailer = $linkTrailer;

            $film->save();

            foreach($registi as $regista){
                $film->registi()->attach($regista);
            }

            foreach($generi as $genere){
                $film->generi()->attach($genere);
            }

            //aggiungo la lista delle lingue audio del film
            foreach($lingueAudio as $lingua){
            $film->lingueAudio()->attach($lingua);
            }

            //aggiungo la lista delle lingue audio del film
            foreach($sottotitoli as $sub){
            $film->sottotitoli()->attach($sub);
        }
    }

    public function editFilm($id, $titolo, $annoUscita, $linkTrailer, $trama, $durata, $registi, $generi, $lingueAudio , $sottotitoli){
        $film = Film::find($id);

        $film->titolo = $titolo;
        $film->anno_uscita = $annoUscita;
        $film->durata = $durata;
        $film->trama = $trama;
        $film->link_trailer = $linkTrailer;

        $film->save();

        //cancello la lista di registi
        //$prevRegisti = $film->registi;
        //foreach($prevRegisti as $prevRegista){
        //    $film->registi()->detach($prevRegista->id);
        //}

        //aggiorno la lista di registi
        //foreach($registi as $regista){
        //   $film->registi()->attach($regista);
        //}

         // aggiorno la lista di registi con sync
        $film->registi()->sync($registi);

        //cancello i generi associati al film
        //$prevGeneri = $film->generi;
        //foreach($prevGeneri as $prevGenere){
        //    $film->generi()->detach($prevGenere->id);
        //}

        //aggiorno la lista di generi del film
        //foreach($generi as $genere){
        //    $film->generi()->attach($genere);
        //}

        // aggiorno la lista di generi con sync
        $film->generi()->sync($generi);

        //cancello lingue audio associate al film
        //$prevLingue = $film->lingueAudio;
        //foreach($prevLingue as $prevLingua){
        //    $film->lingueAudio()->detach($prevLingua->id);
        //}

        //aggiorno la lista delle lingue audio del film
        //foreach($lingueAudio as $lingua){
        //    $film->lingueAudio()->attach($lingua);
        //}

        // aggiorno la lista delle lingue audio con sync
        $film->lingueAudio()->sync($lingueAudio);

         //cancello lingue Sottotitoli associate al film
         //$prevSubs = $film->sottotitoli;
         //foreach($prevSubs as $sub){
         //    $film->sottotitoli()->detach($sub->id);
         //}
 
         //aggiorno la lista delle lingue sottotitoli del film
         //foreach($sottotitoli as $sub){
         //    $film->sottotitoli()->attach($sub);
         //}

         // aggiorno la lista delle lingue sottotitoli con sync
        $film->sottotitoli()->sync($sottotitoli);

         // Ricarico le relazioni per aggiornare gli oggetti in memoria
        $film->load('registi', 'generi', 'lingueAudio', 'sottotitoli');
        

}

    public function deleteFilm($id){

        $film = Film::find($id);

        if ($film !== null) {
            $generi = $film->generi;
            $registi = $film->registi;
            $lingueAudio = $film->lingueAudio;
            $sottotitoli = $film->sottotitoli;
            //$proiezioni = $film->proiezioni;
    
            foreach($generi as $genere){
                $film->generi()->detach($genere->id);
            }
    
            foreach($registi as $regista){
                $film->registi()->detach($regista->id);
            }

            foreach($lingueAudio as $audio){
                $film->lingueAudio()->detach($audio->id);
            }

            foreach($sottotitoli as $sub){
                $film->sottotitoli()->detach($sub->id);
            }

            //foreach($proiezioni as $proiezione){
            //    $film->proiezioni()->detach($proiezione->id);
            //}
    
            //TODO: 2nd ver SE ELIMINO UN FILM ELIMINO ANCHE LE PROIEZIONI ASSOCIATE (?)
    
            $film->delete();
        } else {
            throw new \Exception("Film not found");
        }
    }

    //add regista

    //edit regista

    public function listRegisti(){

        $registi = Regista::with('films') // Carica i film associati a ciascun regista
        ->orderBy('nome', 'asc')
        ->orderBy('cognome', 'asc')
        ->get();

        return $registi;
    }

    public function findRegistaById($id){
        return Regista::find($id);
    }

    public function editRegista($id, $nome, $cognome){
        $regista = Regista::find($id);

        $regista->nome = $nome;
        $regista->cognome = $cognome;

        $regista->save();
    }

    public function addRegista($nome, $cognome){
        $regista = new Regista();

        $regista->nome = $nome;
        $regista->cognome = $cognome;

        $regista->save();
    }

    public function deleteRegista($id){
        $regista = Regista::find($id);

        $regista->delete();

    }

    public function listGeneri(){
        return Genere::orderBy('nome', 'asc')->get();
    }

    public function listLingue(){
        return Lingua::orderBy('lingua', 'asc')->get();
    }
    public function lingueAudioFilm($filmId){
        $film = Film::find($filmId);
        

        if($film){
            $lingue = $film->lingueAudio();
            return $lingue;
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
    public function findProiezioniCinema($cinemaId){
           // Trova il cinema
            $cinema = Cinema::find($cinemaId);
    
            // Recupera tutte le sale del cinema
            $saleCinema = $cinema->sale()->pluck('id')->toArray();
    
            // Recupera tutte le proiezioni nelle sale del cinema
            $proiezioni = Proiezione::whereIn('sala_id', $saleCinema)->get();

            // Recupera i film associati alle proiezioni
            $filmIds = $proiezioni->pluck('film_id')->unique();
            $filmProiezione = Film::whereIn('id', $filmIds)
                         ->with(['registi', 'generi']) // Eager load registi e generi
                         ->get();

            return $filmProiezione;
        }

    public function findProiezioneById($id){
        return Proiezione::find($id);
    }

    public function findProiezioniDateCinema($cinemaId) {
        // Trova il cinema
        $cinema = Cinema::find($cinemaId);
        
        // Recupera tutte le sale del cinema
        $saleCinema = $cinema->sale()->pluck('id')->toArray();
        
        // Recupera tutte le proiezioni nelle sale del cinema
        $proiezioni = Proiezione::whereIn('sala_id', $saleCinema)
                                ->with('film') // Eager load il film associato
                                ->get();
    
        // Raggruppa le proiezioni per film e data
        $proiezioniPerData = $proiezioni->groupBy(function($proiezione) {
            return $proiezione->data; // Supponendo che la colonna della data si chiami 'data_proiezione'
        });
    
        return $proiezioniPerData;
    }

    public function findFilmDetailsWithProiezioni($cinemaId) {
        // Trova il cinema
        $cinema = Cinema::find($cinemaId);
    
        // Recupera tutte le sale del cinema
        $saleCinema = $cinema->sale()->pluck('id')->toArray();
    
        // Recupera tutte le proiezioni nelle sale del cinema
        $proiezioni = Proiezione::whereIn('sala_id', $saleCinema)
                                ->with(['film', 'sala'])
                                ->get();
    
        // Raggruppa le proiezioni per film
        $filmProiezioni = $proiezioni->groupBy(function($proiezione) {
            return $proiezione->film->id;
        });
    
        return $filmProiezioni;
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

    public function listFutureProiez($cinemaId){
         // Trova il cinema
         $cinema = Cinema::find($cinemaId);
    
         // Recupera tutte le sale del cinema
         $saleCinema = $cinema->sale()->pluck('id')->toArray();
     
         // Recupera tutte le proiezioni nelle sale del cinema
         $proiezioni = Proiezione::whereIn('sala_id', $saleCinema)
                                 ->with(['film', 'sala']) // Eager load film e sala associati
                                 ->get();

        // Filtra solo le proiezioni future
        $proiezioniFuture = $proiezioni->filter(function($proiezione) {
        $proiezioneDateTime = Carbon::parse($proiezione->data . ' ' . $proiezione->ora);
        return $proiezioneDateTime->isFuture();
        });
     
         // Raggruppa le proiezioni per film cosi poi posso iterare nella vista sulla chiave (film id) per accedere
         // alle proiezioni
         $filmProiezioni = $proiezioniFuture->groupBy(function($proiezione) {
             return $proiezione->film->id;
         });
         

         return $filmProiezioni;

    }

    public function listSaleCinema(){
        return Sala::all();
    }
    public function addProiezione($filmId, $salaId, $data, $ora){

        $proiezione = new Proiezione();

        $proiezione->film_id = $filmId;
        $proiezione->sala_id = $salaId;
        $proiezione->data = $data;
        $proiezione->ora = $ora;

        $proiezione->save();
    }

    public function editProiezione($id, $filmId, $data, $ora, $sala){
        $proiezione = Proiezione::find($id);

        $proiezione->film_id = $filmId;
        $proiezione->data = Carbon::parse($data);;
        $proiezione->ora =  Carbon::parse($ora)->format('H:i');
        $proiezione->sala_id = $sala;

        $proiezione->save();
    }

    //trovare proiezioni di registi?


    

}
