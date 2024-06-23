<?php

namespace App\Http\Controllers;
use App\Models\DataLayer;

use App\Models\Locandina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Film;


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
        $lingueAudio = $dl->listLingue();
        $sottotitoli = $dl->listLingue();

        return view('film.editFilm')->with('registi', $listaRegisti)->with('generi', $generi)
                                    ->with('lingueAudio', $lingueAudio)->with('lingueSub', $sottotitoli);
    }

    public function store(Request $request){

        
        $generiSelezionati = $request->input('generi', []);
        $registiScelti = $request->input('registi', []);
        $lingueAudioSel = $request->input('lingueAudio', []);
        $lingueSubSel = $request->input('lingueSub', []);

            if($request->hasFile('locandina')){
                $locandina= $request->file('locandina')->getClientOriginalName();
                $path = $request->file('locandina')->storeAs('public/locandine', $locandina);
            }else{
                $locandina = 'locandinaDefault.jpg';
            }

        $dl = new DataLayer();

        $dl->addFilm($request->input('titolo'),
                    $locandina,
                    $request->input('anno_uscita'), 
                    $request->input('trailer'),
                    $request->input('trama'),
                    $request->input('durata'),
                    $registiScelti,
                    $generiSelezionati,
                    $lingueAudioSel,
                    $lingueSubSel
                );

        return Redirect::to(route('film.index'));
    }

    public function show(string $id){
        $dl = new DataLayer();
        $film = $dl->findFilmById($id);

        if($film !== null){
        $film->path_locandina = $film->path_locandina ? asset('storage/' . $film->path_locandina) : '';

            return view('film.details')->with('film', $film);//->with('locandina', $locandina);
        }
        else{
            return view('errors.404'); //->with('messagge', 'FILM ID SBAGLIATO!')
        }
    }

    public function edit(String $id){
        $dl = new DataLayer();

        $registi = $dl->listRegisti();
        $film = $dl->findFilmById($id);
        $generi = $dl->listGeneri();
        $lingueAudio = $dl -> listLingue();
        $sottotitoli = $dl -> listLingue();
        //$locandina = $dl->locandinaFilm($id);

        if($film !== null){
            //VIEW per modifica $film
            return view('film.editFilm')
                        ->with('film', $film)
                        ->with('registi', $registi)
                        ->with('generi', $generi)
                        ->with('lingueAudio', $lingueAudio)
                        ->with('lingueSub', $sottotitoli);
        } else{
            return view('errors.404'); //->with('messagge', 'FILM ID SBAGLIATO!')
        }
    }

    public function update(Request $request, string $id){
        
        $generiSelezionati = $request->input('generi', []);
        $registiSelezionati = $request->input('registi', []);
        $lingueAudioSel = $request->input('lingueAudio', []);
        $lingueSubSel = $request->input('lingueSub', []);
        $locandina = null; 
       
        if($request->hasFile('locandina')){
            $locandina= $request->file('locandina')->getClientOriginalName();
        $path = $request->file('locandina')->storeAs('public/locandine', $locandina);
        }
        


        $dl = new DataLayer();
        // Gestione del caricamento della locandina

            //$locandina = $film->locandinaFilm;
        

        $dl->editFilm($id,  $request->input('titolo'),
                            $locandina,
                            $request->input('anno_uscita'), 
                            $request->input('trailer'),
                            $request->input('trama'), 
                            $request->input('durata'),
                            $registiSelezionati, 
                            $generiSelezionati, 
                            $lingueAudioSel, 
                            $lingueSubSel);
   
        
        return Redirect::to(route('film.index'));
        
    }


    public function destroy(string $id){
        $dl = new DataLayer;

        $dl->deleteFilm($id);

        return Redirect::to(route('film.index'));
    }

    public function confirmDestroy(string $id)
    {
        $dl = new DataLayer();
        $film = $dl->findFilmById($id);

        if ($film !== null) {
            return view('film.deleteFilm')->with('film', $film);
        } else {
            return view('errors.404'); //->with('message','Wrong book ID has been used!');
        }
    }


    public function ajaxCheckFilm(Request $request){
        $dl = new DataLayer();
        

        if($dl->findFilmByTitolo($request->input('titolo'))){
            $response = array('found', true);
        }else{
            $response = array('found', false);
        }

        return response()->json($response);
    }
}
