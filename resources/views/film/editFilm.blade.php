    @extends('layouts.master')

    @section('title')
    @if(isset($film->id))
        MODIFICA:: {{$film->titolo}}
    @else
        Aggiunta di un nuovo film
    @endif
    @endsection

    @section('body')
    <script>
        $(document).ready(function(){
            $("form").submit(function(event){
                // Definire espressione regolari per verificare che i campi (titolo) non contengano cifre
                var regexString = /^[a-zA-Z]+$/;

                //Definisco espressione regolare per verificare che i campi (durata, anno) non contengano caratteri
                var regexInteger = /^\d+$/;

                //Definisco regex per controllare se link film sia effettivamente un url
                var regexLink = /^((http|https):\/\/)?(www\.)?[a-zA-Z0-9@:%._\+~#?&//=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%._\+~#?&//=]*)$/;


                //Controllo i valori del campo Titolo
                var titolo = $("input[name='titolo']").val();
                var trama = $("textarea[name='trama']").val();
                var durata = $("input[name='durata']").val();
                var anno = $("input[name='anno_uscita']").val();
                var trailer = $("input[name='trailer']").val();
                var error = false;


                if(titolo.trim() === ""){
                    error = true;
                    $('#invalid-titolo').text('Il titolo del film è obbligatorio.');
                    event.preventDefault(); //impedisco la partenza della form!
                    $("input[name='titolo']").focus();
                }else {
                    $("#invalid-titolo").text("");
                }

                if(trama.trim() === ""){
                    error = true;
                    $('#invalid-trama').text('La trama del film è obbligatoria.');
                    event.preventDefault(); //impedisco la partenza della form!
                    $("input[name='trama']").focus();
                }else {
                    $("#invalid-trama").text("");
                }

                if(durata.trim() === ""){
                    error = true;
                    $('#invalid-durata').text('La durata del film è obbligatoria.');
                    event.preventDefault();
                    $("input[name='durata']").focus();
                }else if(!regexInteger.test(durata)){
                    error = true;
                    $('#invalid-durata').text('La durata del film NON può contenere caratteri.');
                    event.preventDefault();
                    $("input[name='durata']").focus();
                }else if(durata < 50){
                    confirm("La durata un po' BREVE, continuare?")
                    //$('#invalid-durata').text('La durata del film NON può essere negativa.');
                    $("input[name='durata']").focus();
                }
                else if(durata > 251){ //once upon a time in America usa director's cut length
                    confirm("La durata del film sembra un po' ELEVATA, continuare?")
                    $("input[name='durata']").focus();
                }else {
                    $("#invalid-durata").text("");
                }

                if(anno.trim() === ""){
                    error = true;
                    $('#invalid-anno').text('L\'anno di uscita del film è obbligatorio.');
                    event.preventDefault();
                    $("input[name='anno_uscita']").focus();
                }else {
                    $("#invalid-anno").text("");
                }

                // Verifica se almeno una categoria è stata selezionata
                if ($("input[name='generi[]']:checked").length === 0) {
                    error = true;
                    $("#invalid-genere").text("Selezionare almeno un genere per il film.");
                    event.preventDefault(); // Impedisce l'invio del modulo
                    $("input[name='generi[]']").focus();
                } else {
                    $("#invalid-genere").text("");
                }

                // Verifica se almeno un regista è stata selezionato
                if ($("select[name='registi[]'] option:selected").length === 0) {
                    error = true;
                    $("#invalid-regista").text("Selezionare almeno un regista per il film.");
                    event.preventDefault(); // Impedisce l'invio del modulo
                    $("select[name='registi[]']").focus();
                } else {
                    $("#invalid-regista").text("");
                }

                if(trailer.trim() === ""){
                    error = true;
                    $('#invalid-trailer').text('Inserire un link al trailer del film.');
                    event.preventDefault();
                    $("input[name='trailer']").focus();
                }else if(!regexLink.test(trailer)){
                    error = true;
                    alert("Il link del trailer sembra errato!");
                    event.preventDefault();
                    $("input[name='trailer']").focus();
                } else {
                    $("#invalid-trailer").text("");
                }

                // Verifica se almeno una lingua audio è stata selezionata
                if ($("input[name='lingueAudio[]']:checked").length === 0) {
                    error = true;
                    $("#invalid-lingua-audio").text("Selezionare almeno una lingua per il film.");
                    event.preventDefault(); // Impedisce l'invio del modulo
                    $("input[name='lingueAudio[]']").focus();
                } else {
                    $("#invalid-lingua-audio").text("");
                }

                // Verifica se almeno una lingua sottotitoli è stata selezionata
                if ($("input[name='lingueSub[]']:checked").length === 0) {
                    error = true;
                    $("#invalid-lingua-sub").text("Selezionare almeno una lingua per il film.");
                    event.preventDefault(); // Impedisce l'invio del modulo
                    $("input[name='lingueSub[]']").focus();
                } else {
                    $("#invalid-lingua-sub").text("");
                }
                
                if(!error){
                    //effettuare una chiamata AJAX per verificare che non sia presente un film con lo stesso titolo nel db
                    var methodHttp = $('input[name="_method"]').val();

                    if(methodHttp === undefined){
                        event.preventDefault();

                        //costruisco la mia chiamata ajax
                        $.ajax({
                            type: 'GET',

                            url: '/ajaxFilm',

                            data: {titolo: titolo.trim()},

                            success: function(data){
                                if(data.found){
                                    error = true;
                                    $('#invalid-titolo').text('Un film con lo stesso titolo è gia presente.');
                                }else{
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
        @if(isset($film->id))
            <form class="form-horizontal" name="film" method="post" action="{{ route('film.update', ['film' => $film->id]) }}"  enctype="multipart/form-data">
            @method('PUT')
        @else
            <form class="form-horizontal" name="film" method="post" action="{{ route('film.store') }}"  enctype="multipart/form-data">
        @endif
            @csrf

    <div class="form-group row mb-3">
        <div class="col-md-2">
            <label for="locandina">Locandina</label>
        </div>
        <div class="col-md-10">
        @if(isset($film->id))
                <img src="{{ asset('storage/' . $film->path_locandina)}}" class="img-fluid rounded" alt="Locandina attuale">
        @else
            <img src="{{ asset('storage/locandine/locandinaDefault.jpg') }}" class="img-fluid rounded" alt="Locandina placeholder">
        @endif
            <input type="file" class="form-control" id="locandina" name="locandina" >
            <span class="invalid-input" id="invalid-locandina"></span>
        </div>
    </div>


            <div class="form-group row mb-3">
                    <div class="col-md-2">
                        <label for="titolo">Titolo</label>
                    </div>
                    <div class="col-md-10">
                        @if(isset($film->id))
                            <input class="form-control" type="text" name="titolo" value="{{ $film->titolo }}"/>
                        @else
                            <input class="form-control" type="text" name="titolo"/>
                        @endif
                        <span class="invalid-input" id="invalid-titolo"></span>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-md-2">
                        <label for="registi">Regia</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" multiple="multiple" name="registi[]">
                        @foreach($registi as $regista)
                            @if((isset($film->id))&&($film->registi->contains($regista)))
                                <option value="{{ $regista->id }}" selected="selected">{{ $regista->nome}} {{$regista->cognome}}</option>
                            @else
                                <option value="{{ $regista->id }}">{{ $regista->nome }} {{$regista->cognome}}</option>
                            @endif
                        @endforeach              
                        </select>
                        <span class="invalid-input" id="invalid-regista"></span>  
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-md-2">
                        <label for="trama">Trama</label>
                    </div>
                    <div class="col-md-10">
                        @if(isset($film->id))
                            <textarea maxlength="65535" class="form-control" name="trama" rows="5">{{ $film->trama }}</textarea>
                        @else
                            <textarea maxlength="65535" class="form-control" name="trama" rows="5"></textarea>
                        @endif
                        <span class="invalid-input" id="invalid-trama"></span>
                    </div>
                </div>


        <div class="form-group row mb-3">
            <div class="col-md-2">
                <label for="generi">Generi</label>
            </div>
                <div class="col-md-10">
                    <div class="row">
                        @foreach($generi as $genere)
                            <div class="col-md-4 col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="generi[]" value="{{ $genere->id }}"
                                    @if((isset($film->id)) && ($film->generi->contains($genere)))
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" value="{{ $genere->id }}">
                                        {{ $genere->nome }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        <span class="invalid-input" id="invalid-genere"></span>
                    </div>
                </div>
        </div>


                <div class="form-group row mb-3">
                    <div class="col-md-2">
                        <label for="durata">Durata [minuti]</label>
                    </div>
                    <div class="col-md-10">
                        @if(isset($film->id))
                            <input class="form-control" type="text" name="durata" value="{{ $film->durata }}"/>
                        @else
                            <input class="form-control" type="text" name="durata"/>
                        @endif
                        <span class="invalid-input" id="invalid-durata"></span>
                    </div>
                </div>            

                <div class="form-group row mb-3">
                    <div class="col-md-2">
                        <label for="anno_uscita">Anno</label>
                    </div>
                    <div class="col-md-10">
                        @if(isset($film->id))
                            <input class="form-control" type="text" name="anno_uscita" value="{{ $film->anno_uscita }}"/>
                        @else
                            <input class="form-control" type="text" name="anno_uscita"/>
                        @endif
                        <span class="invalid-input" id="invalid-anno"></span>
                    </div>
                </div>


                <div class="form-group row mb-3">
                    <div class="col-md-2">
                        <label for="trailer">Link Trailer</label>
                    </div>
                    <div class="col-md-10">
                        @if(isset($film->id))
                            <input class="form-control" type="text" name="trailer" value="{{ $film->link_trailer }}"/>
                        @else
                            <input class="form-control" type="text" name="trailer"/>
                        @endif
                        <span class="invalid-input" id="invalid-trailer"></span>
                    </div>
                </div>


                <div class="form-group row mb-3">
                    <div class="col-md-2">
                        <label for="lingueAudio">Lingua audio</label>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            @foreach($lingueAudio as $lingua)
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="lingueAudio[]" value="{{ $lingua->id }}" id="lingua_{{ $lingua->id }}"
                                        @if((isset($film->id)) && ($film->lingueAudio->contains($lingua)))
                                            checked
                                        @elseif($lingua->lingua == 'Italiano') checked
                                        @endif
                                        >
                                        <label class="form-check-label" value="{{ $lingua->id }}">
                                            {{ $lingua->lingua }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            <span class="invalid-input" id="invalid-lingua-audio"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-md-2">
                        <label for="lingueSub">Lingua sottotitoli</label>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            @foreach($lingueSub as $sub)
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="lingueSub[]" value="{{ $sub->id }}" id="lingua_{{ $sub->id }}"
                                        @if((isset($film->id)) && ($film->sottotitoli->contains($sub)))
                                            checked
                                        @elseif($sub->lingua == 'nessuna') checked
                                        @endif
                                        >
                                        <label class="form-check-label" value="{{ $sub->id }}">
                                            {{ $sub->lingua }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            <span class="invalid-input" id="invalid-lingua-sub"></span>
                        </div>
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
                        <a class="btn btn-danger w-100" href="{{ route('film.index') }}"><i class="bi bi-box-arrow-left"></i> Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection