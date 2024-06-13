<?php

namespace App\Http\Controllers;

use App\Models\Proiezione;
use Illuminate\Http\Request;
use App\Models\DataLayer;
use App\Models\Film;
use Illuminate\Support\Facades\Redirect;

class ProgrammazioneController extends Controller
{
    public function index(){
        return null;
    }

    public function create(string $FilmId){
        $dl = new DataLayer();
        $film = $dl->findFilmById($FilmId);
        $sale = $dl->listSaleCinema();

        return view('programmazione.edit')->with('film', $film)->with('sale', $sale);
    }

    public function store(Request $request){
        $dl = new DataLayer();

        $dl->addProiezione( $request->input('film_id'),
                            $request->input('sala_id'),
                            $request->input('data'),
                            $request->input('ora')                            
                            );
        
        return Redirect::to(route('film.index'));
    }

    public function edit(string $proiezId){
        $dl = new DataLayer();

        $proiezione = Proiezione::find($proiezId);
        $film = Film::find($proiezione->film_id);
        $saleCinema = $dl->listSaleCinema();
        $salaProiezione = $proiezione->sala_id;

        return view('programmazione.edit')
                ->with('proiezione', $proiezione)
                ->with('film', $film)
                ->with('sala', $salaProiezione)
                ->with('sale', $saleCinema);
    }

    public function update(Request $request, String $proiezioneId){
        
        $dl = new DataLayer();

        $dl->editProiezione($proiezioneId,
                            $request->input('film_id'),
                            $request->input('data'),
                            $request->input('ora'),
                            $request->input('sala_id'));
        
        return Redirect::to('gardenProgrammazione');
    }
}
