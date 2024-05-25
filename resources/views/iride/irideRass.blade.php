@extends('layouts.master')

@section('title', 'Rassegne Iride')

@section('body')

<div class="container mt-5">
        <div class="row">
            <!-- Inizio Card -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <!-- Informazioni principali -->
                        <div class="col-12 col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">Cineforum estivo</h5>
                                <p class="card-text"><strong>Data Inizio:</strong> 1 Giugno 2024</p>
                                <p class="card-text"><strong>Data Fine:</strong> 30 Giugno 2024</p>
                            </div>
                        </div>

                        <!-- Descrizione -->
                        <div class="col-12 col-md-4">
                            <div class="card-body">
                                <p class="card-text">Una rassegna di film ogni settimana di giugno, con proiezioni di classici, film d'autore e successi recenti. Unisciti a noi per goderti il cinema anche d'estate!</p>
                            </div>
                        </div>

                        <!-- Bottone per il dettaglio -->
                        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center">
                            <div class="card-body text-center">
                                <a href="#" class="btn btn-primary">Dettaglio Rassegna</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fine Card -->
            <!-- Aggiungi ulteriori card qui -->


            <!-- Inizio Card -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <!-- Informazioni principali -->
                        <div class="col-12 col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">Spaghetti western</h5>
                                <p class="card-text"><strong>Data Inizio:</strong> 12 Luglio 2024</p>
                                <p class="card-text"><strong>Data Fine:</strong> 2 Agosto 2024</p>
                            </div>
                        </div>

                        <!-- Descrizione -->
                        <div class="col-12 col-md-4">
                            <div class="card-body">
                                <p class="card-text">Una rassegna dedicata ai classici Spaghetti Western, con proiezioni dei film più iconici del genere.</p>
                            </div>
                        </div>

                        <!-- Bottone per il dettaglio -->
                        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center">
                            <div class="card-body text-center">
                                <a href="#" class="btn btn-primary">Dettaglio Rassegna</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fine Card -->
        </div>
    </div>

@endsection