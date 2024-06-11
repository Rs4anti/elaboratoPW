<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class ProgrammazioneController extends Controller
{
    public function index(){
        return view('programmazione.editProgrammazione');
    }

    public function create(string $FilmId){
        $dl = new DataLayer();
        $film = $dl->findFilmById($FilmId);

        return view('programmazione.edit')->with('film', $film);
    }
}
