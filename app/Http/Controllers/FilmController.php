<?php

namespace App\Http\Controllers;
use App\Models\DataLayer;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(){
        $dl = new DataLayer();
        $films = $dl->listFilms();

        return view('film.films')->with('films_list', $films);
    }
}
