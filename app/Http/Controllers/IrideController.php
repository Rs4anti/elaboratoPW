<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IrideController extends Controller
{
    public function index(){
        return view('iride.iride');
    }
}
