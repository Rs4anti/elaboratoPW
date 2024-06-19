@extends('layouts.master')

@section('title')
    Scheda dettaglio: {{$film->titolo}}
@endsection

@section('body')
<div class="card mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src='{{ $film->locandina_url }}' class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h1 class="card-title text-center"><strong>{{$film->titolo}} [{{$film->anno_uscita}}]</strong></h1>
        <h5 class="card-title"><strong>Durata:</strong> {{$film->durata}}'</h5>

        <p class="card-text"><strong>Genere:</strong> 
                                    @foreach ($film->generi as $gen)
                                    {{$gen->nome}}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach

        <p class="card-text"><strong>Trama:</strong> {{$film->trama}}</p>

        <p class="card-text"><strong>Regia:</strong> 
                                  @foreach ($film->registi as $regista)  
                                    {{ $regista->nome }} {{$regista->cognome}}{{ !$loop->last ? ', ' : '' }}
                                  @endforeach
        </p>

        <p class="card-text"><strong>Lingua audio:</strong> 
                                    @foreach ($film->lingueAudio as $audio)
                                    {{$audio->lingua}}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
        </p>

        <p class="card-text"><strong>Lingua sottotioli:</strong> 
                                    @foreach ($film->sottotitoli as $sub)
                                    {{$sub->lingua}}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
        </p>
          
        <a class="btn btn-danger" href="{{$film->link_trailer}}"> 
        <i class="bi bi-youtube"></i>
          Trailer</a>
      </div>
    </div>
  </div>
</div>
@endsection