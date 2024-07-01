@extends('layouts.master')

@section('title')
    @if(isset($regista->id))
        Modifica {{$regista->nome}} {{$regista->cognome}}
    @else
        Inserimento nuovo regista
    @endif
@endsection

@section('body')
<script>
    $(document).ready(function(){
        $("form").submit(function(event) {
        // Definire le espressioni regolari per verificare che i campi non contengano cifre
        var regex = /^[a-zA-Z\s]+$/;

        // Ottenere i valori dei campi nome e cognome
        var nome = $("input[name='nomeRegista']").val();
        var cognome = $("input[name='cognomeRegista']").val();
        var error = false;
        
        // Verifica se il campo "cognomeRegista" è vuoto
        if (cognome.trim() === "") {
                error=true;
                //alert("Il cognome del regista è obbligatorio.");
                $("#invalid-cognome").text("Il cognome del regista è obbligatorio.");
                event.preventDefault(); // Impedisce l'invio del modulo
                $("input[name='cognomeRegista']").focus();
            } else if(!regex.test(cognome)){
                error=true;
                //alert("Il cognome  del regista non deve contenere cifre.");
                $("#invalid-cognome").text("Il cognome del regista non deve contenere cifre.");
                event.preventDefault(); // Impedisce l'invio del modulo
                $("input[name='cognomeRegista']").focus();
            } else {
                $("#invalid-cognome").text("");
            }
        
        // Verifica se il campo "nomeRegista" è vuoto
        if (nome.trim() === "") {
                error=true;
                //alert("Il nome del regista è obbligatorio.");
                $("#invalid-nome").text("Il nome del regista è obbligatorio.");
                event.preventDefault(); // Impedisce l'invio del modulo
                $("input[name='nomeRegista']").focus();
            } else if(!regex.test(nome)){
                error=true;
                //alert("Il nome  del regista non deve contenere cifre.");
                $("#invalid-nome").text("Il nome  del regista non deve contenere cifre.");
                event.preventDefault(); // Impedisce l'invio del modulo
                $("input[name='nomeRegista']").focus();
            } else {
                $("#invalid-nome").text("");
            }

        if(!error){
            //capire se sono in inserimento->controllo metodo http se definito
            var methodHttp = $('input[name="_method"]').val();

            if (methodHttp === undefined){ // sono in creazione nuovo regista
                event.preventDefault(); //evito di far partire la form e faccio la chiamata ajax

                $.ajax({
                    
                    type: 'GET',

                    url: '/ajaxDirector',

                    data: {nome: nome.trim(), cognome: cognome.trim()},

                    success: function (data){
                        if(data.found){
                            error = true;
                            $("#invalid-cognome").text("Il regista è già presente nel database!");
                        }else{
                            //seleziono il primo modello della lista delle form e faccio partire il submit!
                            $("form")[0].submit(); 
                        }
                    }
                });
            }
        }
    });
});
</script>
<div class="row">
    <div class="col-md-12">
    @if(isset($regista->id))
        <form class="form-horizontal" name="regista" method="post" action="{{ route('regista.update', ['id' => $regista->id]) }}">
            @method('PUT')
    @else
        <form class="form-horizontal" name="regista" method="post" action="{{ route('regista.store')}}">
    @endif
    @csrf
    
        <div class="form-group row mb-3">
            <div class="col-md-2">
                <label for="nomeRegista">Nome</label>
            </div>
            <div class="col-md-10">
                @if(isset($regista->id))
                    <input class="form-control" type="text" name="nomeRegista" placeholder="nome" value="{{ $regista->nome }}"/>
                @else
                    <input class="form-control" type="text" name="nomeRegista"/>
                @endif
                <span class="invalid-input" id="invalid-nome"></span>
            </div>
        </div>
        <div class="form-group row mb-3">
            <div class="col-md-2">
                <label for="cognomeRegista">Cognome</label>
            </div>
            <div class="col-md-10">
                @if(isset($regista->id))
                    <input class="form-control" type="text" name="cognomeRegista" placeholder="cognome" value="{{ $regista->cognome }}"/>
                @else
                    <input class="form-control" type="text" name="cognomeRegista"/>
                @endif
                <span class="invalid-input" id="invalid-cognome"></span>
            </div>
        </div>
        <div class="form-group row mb-3">
            <div class="col-md-10 offset-md-2">
                <label for="mySubmit" class="btn btn-primary w-100"><i class="bi bi-floppy2-fill"></i> Save</label>
                <input id="mySubmit" class="d-none" type="submit" value="Save">
            </div>
        </div>
        <div class="form-group row mb-3">
            <div class="col-md-10 offset-md-2">
                <a class="btn btn-danger w-100" href="{{ route('regista.index') }}"><i class="bi bi-box-arrow-left"></i> Cancel</a>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection