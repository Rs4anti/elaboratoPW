@extends('layouts.master')

@section('title', 'Rassegne Garden')

@section('body')

<div class="row ">
        <div class="col-6 align-items-center d-flex justify-content-center">
            <a href="#" class="btn btn-primary">Vedi rassegne salvate</a>
        </div>
        
        <div class="col-6 align-items-center d-flex justify-content-center">
            <a href="#" class="btn btn-success">Inserisci nuova rassegna</a>
        </div>
</div>

<div class="container mt-5">
        <div class="row">
            <!-- Inizio Card -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <!-- Informazioni principali -->
                        <div class="col-12 col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">Cinema d'Autore</h5>
                                <p class="card-text"><strong>Data Inizio:</strong> 1 Settembre 2024</p>
                                <p class="card-text"><strong>Data Fine:</strong> 15 Ottobre 2024</p>
                            </div>
                        </div>

                        <!-- Descrizione -->
                        <div class="col-12 col-md-4">
                            <div class="card-body">
                                <p class="card-text">Un viaggio attraverso i capolavori dei grandi maestri del cinema internazionale.</p>
                            </div>
                        </div>

                        <!-- Bottone per il dettaglio -->
                        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center">
                            <div class="card-body text-center">
                                <a href="#" class="btn btn-primary">Dettaglio Rassegna</a>
                                <a href="#" class="btn btn-danger">Modifica Rassegna</a>
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
                                <h5 class="card-title">Notte Horror</h5>
                                <p class="card-text"><strong>Data Inizio:</strong> 15 Ottobre 2024</p>
                                <p class="card-text"><strong>Data Fine:</strong> 2 Novembre 2024</p>
                            </div>
                        </div>

                        <!-- Descrizione -->
                        <div class="col-12 col-md-4">
                            <div class="card-body">
                                <p class="card-text">Una selezione dei film horror più spaventosi e iconici di sempre.</p>
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