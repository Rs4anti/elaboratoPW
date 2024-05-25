@extends('layouts.master')

@section('title', 'Programmazione Iride-Vega')

@section('body')

    <div class="row">
        <!-- Inizio Card -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="row g-0"> <!-- classe di utilità di Bootstrap che rimuove tutte le spaziature (gutter) tra le colonne all'interno della riga-->

                    <!-- Locandina del Film -->
                    <div class="col-md-4">
                        <img src="/img/Locandine/back-to-the-future-locandina.jpg" class="img-fluid rounded-start" alt="Locandina Scarface">
                    </div>


                    <!-- Informazioni del Film -->
                    <div class="col-md-8">
                        <div class="row">

                            <!-- Central Info -->
                            <div class="col-md-6 order-md-1 order-2">
                                <div class="card-body">
                                    <h5 class="card-title">Ritorno al futuro</h5>
                                    <p class="card-text"><strong>Regia:</strong>Robert Zemeckis</p>
                                    <p class="card-text"><strong>Genere:</strong> Commedia, fantascienza, avventura</p>
                                    <p class="card-text"><strong>Data Uscita:</strong> 18 ottobre 1985</p>
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

        <!-- Inizio Card -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="row g-0"> <!-- classe di utilità di Bootstrap che rimuove tutte le spaziature (gutter) tra le colonne all'interno della riga-->

                    <!-- Locandina del Film -->
                    <div class="col-md-4">
                        <img src="/img/Locandine/signoreAnelli_locandina.jpg" class="img-fluid rounded-start" alt="Locandina Scarface">
                    </div>


                    <!-- Informazioni del Film -->
                    <div class="col-md-8">
                        <div class="row">

                            <!-- Central Info -->
                            <div class="col-md-6 order-md-1 order-2">
                                <div class="card-body">
                                    <h5 class="card-title">Il Signore degli Anelli - La Compagnia dell'Anello</h5>
                                    <p class="card-text"><strong>Regia:</strong>Peter Jackson</p>
                                    <p class="card-text"><strong>Genere:</strong> Fantastico, avventura, azione, epico, drammatico</p>
                                    <p class="card-text"><strong>Data Uscita:</strong> 18 gennaio 2002</p>
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

@endsection