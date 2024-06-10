<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;

class GardenProgrController extends Controller
{
    public function index(){
        //ID cinema garden == 1
        $dl = new DataLayer();
        $filmsProiezioni = $dl->findProiezioniCinema('1');
        $filmsProiezioni = $dl->findFilmDetailsWithProiezioni('1');
    
        return view('garden.gardenProgr')
            ->with('filmsProiezioni', $filmsProiezioni);
    }

}
