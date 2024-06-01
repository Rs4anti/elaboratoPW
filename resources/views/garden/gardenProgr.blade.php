@extends('layouts.master')

@section('title', 'Programmazione Multisale Garden')

@section('body')

<div class="row">
    <div class="col-6 align-items-center d-flex justify-content-center">
        <a href="#" class="btn btn-primary">Vedi film salvati</a>
    </div>
    
    <div class="col-6 align-items-center d-flex justify-content-center">
        <a href="#" class="btn btn-success">Inserisci programmazione</a>
    </div>

</div>

    <div class="row">
        <!-- Inizio Card -->
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
                                    <h5 class="card-title">Scarface</h5>
                                    <p class="card-text"><strong>Regia:</strong> Brian De Palma</p>
                                    <p class="card-text"><strong>Genere:</strong> Noir, drammatico, gangster, thriller, azione</p>
                                    <p class="card-text"><strong>Data Uscita:</strong> 20 Aprile 1984</p>
                                    <!-- Bottone per scheda film -->
                                    <a href="#" class="btn btn-primary">Scheda film</a>

                                    <!-- Bottone per modifica programmazione -->
                                    <a href="#" class="btn btn-secondary">Modifica programmazione</a>

                                    <!-- Bottone per modifica orari (?) -->
                                    <a href="#" class="btn btn-warning">Modifica orari</a>

                                    
                                    <!-- Bottone per eliminare programmazione -->
                                    <a href="#" class="btn btn-danger">Elimina programmazione</a>
                                </div>
                            </div>

                            <!-- Giorni e Orari di Programmazione -->
                            <div class="col-md-6 order-md-2 order-3">
                                <div class="card-body">
                                    <h6 class="card-title">Orari:</h6>
                                    <p class="card-text"><strong>Lunedì:</strong> 3:00 PM, 6:00 PM, 9:00 PM</p>
                                    <p class="card-text"><strong>Martedì:</strong> 3:00 PM, 6:00 PM, 9:00 PM</p>
                                    <p class="card-text"><strong>Mercoledì:</strong> 3:00 PM, 6:00 PM, 9:00 PM</p>
                                    <p class="card-text"><strong>Giovedì:</strong> 3:00 PM, 6:00 PM, 9:00 PM</p>
                                    <p class="card-text"><strong>Venerdì:</strong> 3:00 PM, 6:00 PM, 9:00 PM</p>
                                    <p class="card-text"><strong>Sabato:</strong> 1:00 PM, 4:00 PM, 7:00 PM, 10:00 PM</p>
                                    <p class="card-text"><strong>Domenica:</strong> 1:00 PM, 4:00 PM, 7:00 PM, 10:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fine Card -->

        <!-- Inizio Card -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="row g-0"> <!-- classe di utilità di Bootstrap che rimuove tutte le spaziature (gutter) tra le colonne all'interno della riga-->

                    <!-- Locandina del Film -->
                    <div class="col-md-4">
                        <img src="/img/Locandine/treUominiGamba_locandina.jpg" class="img-fluid rounded-start" alt="Locandina Scarface">
                    </div>


                    <!-- Informazioni del Film -->
                    <div class="col-md-8">
                        <div class="row">

                            <!-- Central Info -->
                            <div class="col-md-6 order-md-1 order-2">
                                <div class="card-body">
                                    <h5 class="card-title">Tre uomini e una gamba</h5>
                                    <p class="card-text"><strong>Regia:</strong> Aldo, Giovanni e Giacomo</p>
                                    <p class="card-text"><strong>Genere:</strong> Commedia, avventura</p>
                                    <p class="card-text"><strong>Data Uscita:</strong> 27 Dicembre 1997</p>
                                    <!-- Bottone per scheda film -->
                                    <a href="#" class="btn btn-primary">Scheda film</a>
                                </div>
                            </div>
                            <!-- Giorni e Orari di Programmazione -->
                            <div class="col-md-6 order-md-2 order-3">
                                <div class="card-body">
                                    <h6 class="card-title">Orari:</h6>
                                    <p class="card-text"><strong>Lunedì:</strong> 3:00 PM, 6:00 PM, 9:00 PM</p>
                                    <p class="card-text"><strong>Martedì:</strong> 3:00 PM, 6:00 PM, 9:00 PM</p>
                                    <p class="card-text"><strong>Mercoledì:</strong> 3:00 PM, 6:00 PM, 9:00 PM</p>
                                    <p class="card-text"><strong>Giovedì:</strong> 3:00 PM, 6:00 PM, 9:00 PM</p>
                                    <p class="card-text"><strong>Venerdì:</strong> 3:00 PM, 6:00 PM, 9:00 PM</p>
                                    <p class="card-text"><strong>Sabato:</strong> 1:00 PM, 4:00 PM, 7:00 PM, 10:00 PM</p>
                                    <p class="card-text"><strong>Domenica:</strong> 1:00 PM, 4:00 PM, 7:00 PM, 10:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fine Card -->
        
        <!-- Aggiungere altre card qui -->

    </div>
    
    <div class="row justify">
        <a href="{{route('home')}}" class="btn btn-primary">
        <i class="bi bi-house"></i>    
        Torna alla home</a>
    </div>
    

@endsection