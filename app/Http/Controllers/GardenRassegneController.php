<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GardenRassegneController extends Controller
{
    public function index(){
        return view('garden.gardenRass');
    }
}
