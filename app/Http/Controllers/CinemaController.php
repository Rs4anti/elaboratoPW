<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function contatti()
    {
        $cinemas = Cinema::with('indirizzo')->get();
        return view('contatti', compact('cinemas'));
    }
}
