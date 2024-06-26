<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;

class GardenProgrController extends Controller
{
    public function index(){
        session_start();
        //ID cinema garden == 1
        $dl = new DataLayer();
        
        $filmsProiezioni = $dl->findFilmDetailsWithProiezioni('1');
        
        //ritorno solo le proiezioni di film nel futuro rispetto ad ora
        //$filmsProiezioni = $dl->listFutureProiezCinema('1');

        return view('garden.gardenProgr')
            ->with('filmsProiezioni', $filmsProiezioni);
    }

}
