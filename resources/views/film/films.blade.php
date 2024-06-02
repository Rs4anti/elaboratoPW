@extends('layouts.master')

@section('title', 'Lista Film')


@section('body')

<div class="row">
    <div class="col-xs-6 d-flex justify-content-end">
        <p>
            <a class="btn btn-success" href="#">
                <i class="bi bi-database-add"></i> 
                 Inserisci nuovo film
            </a>
        </p>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($films_list as $film)
            <!-- Inizio card per un film -->
            <div class="col-md-4 mb-4">
                <!--TODO: gestire locandine-->
                <div class="card h-100" style="background-image: url('/img/Locandine/scarfaceLocandina.jpg'); background-size: cover; background-position: center;">
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
                        
                        <a class="btn btn-secondary" 
                                href="{{ route('film.show', ['film' => $film->id]) }}">
                                Scheda film</a>

                        <a class="btn btn-secondary"
                                href="{{ route('film.edit', ['film' => $film->id]) }}">
                                Modifica</a>

                        <a href="#" class="btn btn-danger">Elimina</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



@endsection