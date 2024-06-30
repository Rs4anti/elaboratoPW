@extends('layouts.master')

@section('title', 'Indirizzi Cinema')

@section('body')

<div class="container mt-4">
    <div class="row">
        @foreach($cinemas as $cinema)
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>{{ $cinema->nome }}</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Indirizzo:</strong></p>
                        <p>{{ $cinema->indirizzo->via }} {{ $cinema->indirizzo->civico }} , {{$cinema->indirizzo->CAP}}</p>
                        <p>{{ $cinema->indirizzo->citta }}, {{ $cinema->indirizzo->provincia }}</p>
                        <p>{{ $cinema->indirizzo->regione }}, {{ $cinema->indirizzo->nazione }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
