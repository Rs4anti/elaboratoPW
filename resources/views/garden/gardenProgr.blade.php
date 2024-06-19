@php
    use Carbon\Carbon;
@endphp
@extends('layouts.master')

@section('title', 'Programmazione Multisala  Garden')

@section('body')

    <div class="row">
        @foreach ($filmsProiezioni as $filmId => $proiezioni) 

        @php
            #recupero il primo film associato ad ogni proiezione
            $film = $proiezioni->first()->film;
            if($film !== null){ $film->path_locandina = $film->path_locandina ? asset('storage/' . $film->path_locandina) : '';}
        @endphp
    
        <!-- Inizio Card -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="row g-0"> <!-- classe di utilità di Bootstrap che rimuove tutte le spaziature (gutter) tra le colonne all'interno della riga-->

                    <!-- Locandina del Film -->
                    <div class="col-md-4">
                        <img src="{{($film->path_locandina)}}" class="img-fluid rounded-start" alt="Locandina Scarface">
                    </div>

                    <!-- Informazioni del Film -->
                    <div class="col-md-8">
                        <div class="row">

                            <!-- Central Info -->
                            <div class="col-md-6 order-md-1 order-2">
                                <div class="card-body">
                                    <h5 class="card-title">{{$film->titolo}}</h5>
                                    
                                    <p class="card-text"><strong>Regia:</strong>
                                    @foreach ($film->registi as $regista)
                                     {{ $regista->nome }} {{$regista->cognome}}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                    </p>

                                    <p class="card-text"><strong>Genere:</strong> 
                                    @foreach ($film->generi as $gen)
                                    {{$gen->nome}}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                    </p>

                                    <p class="card-text"><strong>Anno Uscita: </strong>{{$film->anno_uscita}}</p>

                                    <!-- Bottone per scheda film -->
                                    <a href="{{ route('film.show', ['film' => $film->id]) }}" class="btn btn-primary">Scheda film</a>
                                </div>
                            </div>

                            <!-- Giorni e Orari di Programmazione -->
                            <div class="col-md-6 order-md-2 order-3">
                                <div class="card-body">
                                    <h6 class="card-title">Orari:</h6>
                                        @php
                                        // Raggruppa le proiezioni per data
                                            $proiezioniPerData = $proiezioni->groupBy('data');
                                            
                                        @endphp

                                        @foreach ($proiezioniPerData as $data => $proiezioni)
                                        @php
                                            // Crea un'istanza di Carbon dalla data
                                            $carbonDate = Carbon::parse($data);
                                            // Estrai il mese e il giorno
                                            $formattedDate = $carbonDate->format('d/M'); // Esempio: "Jan 01"

                                        @endphp
                                        <p><strong>{{ $formattedDate }}:</strong> 
                                            @foreach ($proiezioni as $proiezione)
                                            {{ Carbon::parse($proiezione->ora)->format('H:i') }} @if (!$loop->last), @endif
                                            <!-- Bottone per modifica programmazione -->
                                            <div>
                                            <a href="{{route('programmazione.edit', ['programmazione' => $proiezione->id])}}" class="btn btn-warning">Modifica programmazione</a>

                                            <!-- Bottone per eliminare programmazione -->
                                            <a href="#" class="btn btn-danger">Elimina programmazione</a>
                                            </div>
                                            @endforeach
                                        </p>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fine Card -->
        @endforeach
    
    <div class="row justify">
        <a href="{{route('home')}}" class="btn btn-primary">
        <i class="bi bi-house"></i>    
        Torna alla home</a>
    </div>
    

@endsection