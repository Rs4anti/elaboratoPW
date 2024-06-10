<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function showProiezioni($cinemaId) {
        $dl = new DataLayer();
        $filmTitoli = $dl->findProiezioniCinema($cinemaId);
    
        return view('cinema.proiezioni')
            ->with('filmTitoli', $filmTitoli);
    }
}
