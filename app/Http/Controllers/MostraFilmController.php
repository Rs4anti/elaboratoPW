<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class MostraFilmController extends Controller
{
    public function show(string $id){
        session_start();
        $dl = new DataLayer();
        $film = $dl->findFilmById($id);

        if($film !== null){
        $film->path_locandina = $film->path_locandina ? asset('storage/' . $film->path_locandina) : '';

            return view('film.details')->with('film', $film);
        }
        else{
            return view('errors.404')->with('message', 'FILM NON TROVATO!');  
        }
    }
}
