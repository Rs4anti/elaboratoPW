<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class IrideProgrController extends Controller
{
    public function index(){
        //ID cinema iride == 2
        $dl = new DataLayer();
        $filmsProiezioni = $dl->findProiezioniCinema('2');
        $filmsProiezioni = $dl->findFilmDetailsWithProiezioni('2');
    
        return view('iride.irideProgr')
            ->with('filmsProiezioni', $filmsProiezioni);
    }
}
