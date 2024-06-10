<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgrammazioneController extends Controller
{
    public function index(){
        return view('programmazione.editProgrammazione');
    }
}
