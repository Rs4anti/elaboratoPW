@extends('layouts.master')

@section('title', 'Dettaglio film')

@section('body')
<div class="card mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/img/Locandine/scarfaceLocandina.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h1 class="card-title text-center"><strong>{{$film->titolo}} [{{$film->anno_uscita}}]</strong></h1>
        <h5 class="card-title"><strong>Durata:</strong> {{$film->durata}}'</h5>
        <p class="card-text"><strong>Genere:</strong> 
                                    @foreach ($film->genere as $gen)
                                    {{$gen->nome}}
                                    @endforeach
        <p class="card-text"><strong>Trama:</strong> {{$film->trama}}</p>
        <p class="card-text"><strong>Regia:</strong> 
                                    @foreach ($film->registi as $regista)
                                    <div>{{$regista->nome}} {{$regista->cognome}}</div>
                                    @endforeach
        <a class="btn btn-primary" href="https://www.youtube.com/watch?v=azNl5JJtaWY"> Vedi trailer</a>
      </div>
    </div>
  </div>
</div>
@endsection