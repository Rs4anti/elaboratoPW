<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class RegistaController extends Controller
{
    public function index(){
        session_start();
        $dl = new DataLayer();
        $registi = $dl->listRegisti();

        return view('director.directors')->with('lista_registi', $registi);
    }

    public function edit(string $id){
        $dl = new DataLayer();

        
        $regista = $dl->findRegistaById($id);

        if($regista !==null)
            return view('director.editDirector')->with('regista', $regista);
        else{
            return view('errors.404');
        }    
    }

    public function update(Request $request, string $id){

        $nome = $request->input('nomeRegista');
        $cognome = $request->input('cognomeRegista');

        $dl = new DataLayer();

        $dl->editRegista($id, $nome, $cognome);

        return Redirect::to(route('regista.index'));
    }

    public function store(Request $request){
        $nome = $request->input('nomeRegista');
        $cognome = $request->input('cognomeRegista');

        $dl = new DataLayer();

        $dl->addRegista($nome, $cognome);

        return Redirect::to(route('regista.index'));
    }

    public function create(){
        return view('director.editDirector');
    }

    public function confirmDestroy(string $id)
    {
        $dl = new DataLayer();
        $regista = $dl->findRegistaById($id);

        if ($regista !== null) {
            return view('director.deleteDirector')->with('regista', $regista);
        } else {
            return view('errors.404'); //->with('message','Regista ID errato!');
        }
    }

    public function destroy(string $id){
        $dl = new DataLayer;

        $dl->deleteRegista($id);

        return Redirect::to(route('regista.index'));
    }

    public function show(string $id){
        $dl = new DataLayer();
        $regista = $dl->findRegistaById($id);
        $filmAssociati = $dl->findFilmRegista($id);

        return view('director.details')->with('regista', $regista)->with('filmAssociati', $filmAssociati);
    }

    public function ajaxCheckRegista(Request $request){
        $dl = new DataLayer();

        $nome = $request->input('nome');
        $cognome = $request->input('cognome');

        if($dl->findRegistaByNomeCognome($nome, $cognome)){

            //regista trovato!
            $response = array('found' => true);

        }else{
            //regista NON trovato!
            $response = array('found' => false);
        }

        //ritorno un json {'found': true|false}
        return response()->json($response);
    }
}
