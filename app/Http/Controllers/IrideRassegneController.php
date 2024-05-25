<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IrideRassegneController extends Controller
{
    public function index(){
        return view('iride.irideRass');
    }
}
