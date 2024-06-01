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

<div class="row">
    <div class="col-md-12">
        <table class="table table-stripe table-hover">
            <col width="30%">
            <col width="20%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Regista</th>
                    <th>Genere</th>
                    <th>Anno</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($films_list as $film)
                    <tr>
                        <td>{{ $film -> titolo}}</td>
                        <td> 
                            @foreach ($film->registi as $regista)
                                <div>{{ $regista->nome}} {{$regista->cognome}}</div>
                            @endforeach
                        </td>
                        
                        <td>
                            @foreach ($film->genere as $gen)
                            <div>{{$gen->nome}}</div>
                            
                            @endforeach
                        </td>

                        <td>{{ $film-> anno_uscita}}</td>

                        <td>
                            <a class="btn btn-secondary"
                                href="#">Scheda film</a>
                        </td>
                        <td>
                            <a class="btn btn-primary"
                                href="#">Modifica</a>
                        </td>
                        <td>
                            <a class="btn btn-danger"
                                href="#">Elimina</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Inizio Card 
@foreach ($films_list as $film)
    <div class="col-12 mb-4">
                <div class="card">
                    <div class="row g-0"> <!-- classe di utilità di Bootstrap che rimuove tutte le spaziature (gutter) tra le colonne all'interno della riga-->

                        <!-- Locandina del Film -->
                        <div class="col-md-4">
                            <img src="/img/Locandine/scarfaceLocandina.jpg" class="img-fluid rounded-start" alt="Locandina Scarface">
                        </div> 


                        <!-- Informazioni del Film -->
                        <div class="col-md-8">
                            <div class="row">

                                <!-- Central Info -->
                                <div class="col-md-6 order-md-1 order-2">
                                    <div class="card-body">
                                        <h5 class="card-title">Titolo: {{ $film -> titolo}}</h5>

                                        <p class="card-text"><strong>Regia:</strong> 
                                            @foreach ($film->registi as $regista)
                                                <div>{{ $regista->nome}} {{$regista->cognome}}</div>
                                            @endforeach
                                        </p>

                                        <p class="card-text"><strong>Genere: </strong> 
                                            @foreach ($film->genere as $gen)
                                                <div>{{$gen->nome}}</div>
                                            @endforeach
                                        </p>

                                        <p class="card-text"><strong>Anno Uscita:</strong> {{ $film-> anno_uscita}}</p>
                                        <!-- Bottone per scheda film -->
                                        <a href="#" class="btn btn-primary">Scheda film</a>

                                        <a href="#" class="btn btn-secondary">Modifica</a>
                                        
                                        <!-- Bottone per eliminare film -->
                                        <a href="#" class="btn btn-danger">Elimina film</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
    -->
@endsection