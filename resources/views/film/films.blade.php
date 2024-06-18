@extends('layouts.master')

@section('title', 'Lista Film')


@section('body')

<script>
    $(document).ready( function() {

        $(".searchOptions").on("click", function(e) {
            e.preventDefault();
            var parametroRicerca = $(this).attr("data-column");
            $("#searchInput").attr("data-column", parametroRicerca);
            $("#searchInput").attr("placeholder", "Cerca per " + $(this).text().toLowerCase() + " film...");
            $("#searchInput").trigger("keyup"); // Riesegui la ricerca quando viene selezionata una colonna
        });


        // $("searchInput").on("keyup", function(){
        //     var value = $(this).val().toLowerCase();
        //     $("card card-body").each(function (){
        //         var found = false;
        //         switch (searchOptions)
        //             case
        //     })
        // });
    });
</script>


<div class="row">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Cerca per</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item searchOptions" href="#" data-column="0">Titolo</a></li>
                <li><a class="dropdown-item searchOptions" href="#" data-column="1">Regista</a></li>
                <li><a class="dropdown-item searchOptions" href="#" data-column="2">Anno uscita</a></li>
                <li><a class="dropdown-item searchOptions" href="#" data-column="-1">Titolo o regista</a></li>
            </ul>
        </div>
        <input type="text" id="searchInput" class="form-control" aria-label="Text input with dropdown button" placeholder="Cerca...">
    </div>
</div>


<div class="row">
    <div class="col-xs-6 d-flex justify-content">
        <p>
            <a class="btn btn-success" href="{{route('film.create')}}">
                <i class="bi bi-database-add"></i> 
                 Inserisci nuovo film
            </a>
        </p>
    </div>
</div>

<div class="container">
    <div class="row">
        
            <!-- Inizio card per un film-->
            @foreach ($films_list as $film)
            <div class="col-md-4 mb-4">
                <!--TODO: gestire locandine-->
                <div class="card h-100" style="background-image: url(''); background-size: cover; background-position: center;">
                    <div class="card-body text-white" style="background: rgba(0, 0, 0, 0.5);">
                        <h4 class="card-title film-title"><strong>{{ $film->titolo }}</strong></h4>
                        <h5 class="card-subtitle mb-2 regia">Regia:
                            @foreach ($film->registi as $regista)
                                <div>{{ $regista->nome }} {{ $regista->cognome }}</div>
                            @endforeach
                        </h5>
                        <h5 class="card-text genere">Genere:
                            @foreach ($film->generi as $gen)
                                <div>{{$gen->nome}}</div>
                            @endforeach
                        </h5>
                        <p class="card-text anno-uscita">Anno: {{ $film->anno_uscita }}</p>
                        <p class="class-text durata-film">Durata: {{$film->durata}} min</p>
                        
                        <a class="btn btn-primary" 
                                href="{{ route('film.show', ['film' => $film->id]) }}">
                                <i class="bi bi-eye"></i>
                                Scheda film</a>

                        <a class="btn btn-secondary"
                                href="{{ route('film.edit', ['film' => $film->id]) }}">
                                <i class="bi bi-pencil-square"></i>
                                Modifica Film</a>

                        <a class="btn btn-success"
                            href="{{route('programmazione.create', ['id' => $film->id])}}">
                            <i class="bi bi-clock-history"></i>    
                                Inserisci programmazione</a>

                        <a class="btn btn-danger" 
                                href="{{ route('film.destroy.confirm', ['id' => $film->id]) }}">
                                <i class="bi bi-trash"></i>
                                 Cancella Film</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



@endsection