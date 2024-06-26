<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){
        $dl = new DataLayer();
        
        // Recupera le preferenze
        $generiPreferiti = $dl->generiPreferitiUtente($_SESSION['loggedID']);
        $registiPreferiti = $dl->registiPreferitiUtente($_SESSION['loggedID']);

        $registi = $dl->listRegisti();
        $generi = $dl->listGeneri();

        return view('user.preferenzeUtente')
            ->with('registi', $registi)
            ->with('generi', $generi)
            ->with('generiPreferiti', $generiPreferiti)
            ->with('registiPreferiti', $registiPreferiti);
    }


    public function update(Request $request){
        $userID = $_SESSION['loggedID'];

        $generiSelezionati = $request->input('generi', []);
        $registiSelezionati =  $request->input('registi', []);

        $dl = new DataLayer();

        $dl->updatePreferenzeUtente($userID, $generiSelezionati, $registiSelezionati);

        return Redirect::to(route('suggerimentiUtente'));
    }

    public function store(Request $request){
        $userID = $_SESSION['loggedID'];
        $generiSelezionati = $request->input('generi', []);
        $registiScelti = $request->input('registi', []);

        $dl = new DataLayer();

        $dl->addPreferenzeUtente($userID, $generiSelezionati, $registiScelti);

        return Redirect::to(route('suggerimentiUtente'));

    }
    public function suggerimenti(){
        $userID = $_SESSION['loggedID'];

        $dl = new DataLayer();
        
        $filmsByRegista = $dl->  suggerisciFilmByRegista($userID);

        foreach($filmsByRegista as $film){

            if($film !== null){
                $film->proiezioniFuture = $dl->listFutureProiezFilm($film->id);
            }
        }

       $filmsByGenere = $dl->  suggerisciFilmByGenere($userID);
        foreach($filmsByGenere as $film){

            if($film !== null){
                $film->proiezioniFuture = $dl->listFutureProiezFilm($film->id);
            }
        }



        return view('user.suggerimenti')
                ->with('filmsByRegista', $filmsByRegista)
                ->with('filmsByGenere', $filmsByGenere);
    }
}
