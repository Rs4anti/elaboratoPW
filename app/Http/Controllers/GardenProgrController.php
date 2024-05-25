<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GardenProgrController extends Controller
{
    public function index(){
        return view('garden.gardenProgr');
    }
}
