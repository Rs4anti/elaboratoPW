<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class IrideProgrController extends Controller
{
    public function index(){
        session_start();
        //ID cinema iride == 2
        $dl = new DataLayer();
        
        //$filmsProiezioni = $dl->findFilmDetailsWithProiezioni('2');
        
        //ritorno solo le proiezioni di film nel futuro rispetto ad ora
        $filmsProiezioni = $dl->listFutureProiezCinema('2');

        /*RICORDA che filmsproiezione del tipo*/ 
        /* $filmsProiezioni = [
            1 => Collection of proiezioni for film with ID 1,
            2 => Collection of proiezioni for film with ID 2,
            ...
        ]; */

        return view('iride.irideProgr')
            ->with('filmsProiezioni', $filmsProiezioni);
    }
}
