<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class UserController extends Controller
{
    public function index(){
        $dl = new DataLayer();
        
        // Recupera le preferenze
        $generiPreferiti = $dl->generiPreferitiUtente($_SESSION['loggedID']);
        $registiPreferiti = $dl->registiPreferitiUtente($_SESSION['loggedID']);

        $prferenzeEspresse = $dl->checkPreferenze($_SESSION['loggedID']);

        $registi = $dl->listRegisti();
        $generi = $dl->listGeneri();

        return view('user.preferenzeUtente')
            ->with('registi', $registi)
            ->with('generi', $generi)
            ->with('generiPreferiti', $generiPreferiti)
            ->with('registiPreferiti', $registiPreferiti)
            ->with('preferenze', $prferenzeEspresse);
    }


    public function update(Request $request){
        $userID = $_SESSION['loggedID'];
        $generiSelezionati = $request->input('generi[]');
        $registiSelezionati =  $request->input('registi[]');

        $dl = new DataLayer();

        $dl->updatePreferenzeUtente($userID, $generiSelezionati, $registiSelezionati);

    }
    public function suggerimenti(){
        return view('user.suggerimenti');
    }
}
