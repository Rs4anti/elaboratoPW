<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IrideProgrController extends Controller
{
    public function index(){
        return view('iride.irideProgr');
    }
}
