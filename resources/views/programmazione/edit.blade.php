@extends('layouts.master')

@section('title')
@if(isset($proiezione->id))
    Modifica proiezione per {{$film->titolo}}
@else 
    Inserimento proiezione per {{$film->titolo}}
@endif
@endsection

@section('body')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cinemaRadios = document.querySelectorAll('input[name="cinema_id"]');
        const salaOptions = document.querySelectorAll('.sala-option');

        function updateSalaOptions() {
            const selectedCinema = document.querySelector('input[name="cinema_id"]:checked').getAttribute('data-column');
            salaOptions.forEach(option => {
                if (option.classList.contains('cinema-' + selectedCinema)) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
        }

        cinemaRadios.forEach(radio => {
            radio.addEventListener('click', function() {
                console.log(this.getAttribute('data-column'));
                updateSalaOptions();
            });
        });

        // Call the function once on page load to set the initial state
        updateSalaOptions();
    });
</script>

<div class="container">
    <div class="row">
        <!-- Card con i dettagli del film sulla sinistra -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    Film {{$film->titolo}}
                </div>
                <div class="card-body">
                    <img src="{{asset('storage/' . $film->path_locandina)}}" class="card-img-top mb-3" alt="Locandina di {{ $film->titolo }}">
                    <p class="card-text"><strong>Anno di uscita:</strong> {{ $film->anno_uscita }}</p>
                    <p class="card-text"><strong>Durata:</strong> {{ $film->durata }} minuti</p>
                    <p class="card-text"><strong>Trailer:</strong> <a href="{{ $film->link_trailer }}" target="_blank">Guarda il Trailer</a></p>
                </div>
            </div>
        </div>
        
        <!-- Form per programmare il film sulla destra -->
        <div class="col-md-8">
            @if(isset($proiezione->id))
                <form class="form-horizontal" name="proiezione" method="post" action="{{ route('programmazione.update', ['programmazione' => $proiezione->id]) }}">
                @method('PUT')
            @else
                <form action="{{route('programmazione.store')}}" method="post">
            @endif
                @csrf
                
                <input type="hidden" name="film_id" value="{{ $film->id }}">
                
                <!-- Radio Button per scelta cinema -->
                <div class="form-group">
                    <label for="cinema">Scegli cinema:</label><br>
                    <div class="form-check">
                        <input class="form-check-input check-input-cinema" type="radio" name="cinema_id" id="cinema1" data-column="1" 
                        {{ (isset($proiezione) && $proiezione->sala->cinema_id == '1') ? 'checked' : '' }} 
                        {{ !isset($proiezione) ? 'checked' : '' }} required>
                        <label class="form-check-label" for="cinema1">
                            Multisala Garden
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input check-input-cinema" type="radio" name="cinema_id" id="cinema2" data-column="2" 
                        {{ (isset($proiezione) && $proiezione->sala->cinema_id == '2') ? 'checked' : '' }} required>
                        <label class="form-check-label" for="cinema2">
                            Cinema Iride-Vega
                        </label>
                    </div>
                </div>
                
                <!-- Campi per data, ora, sala -->
                <div class="form-group">
                    <label for="data">Data</label>
                    <input type="date" class="form-control" id="data" name="data" value=
                    "{{ isset($proiezione->data) ? \Carbon\Carbon::parse($proiezione->data)->format('Y-m-d') : '' }}" required>
                </div>

                <div class="form-group">
                    <label for="ora">Ora</label>
                    <input type="time" class="form-control" id="ora" name="ora" value=
                    "{{ isset($proiezione->ora) ? \Carbon\Carbon::parse($proiezione->ora)->format('H:i') : '' }}" required>
                </div>

                <div class="form-group">
                    <label for="sala">Sala</label><br>
                    @foreach($sale as $sala)
                        <div class="form-check sala-option cinema-{{$sala->cinema_id}}">
                        <input class="form-check-input" type="radio" name="sala_id" id="sala{{ $sala->id }}" value="{{ $sala->id }}" 
                            {{ (isset($proiezione) && $proiezione->sala_id == $sala->id) ? 'checked' : '' }} required>
                            <label class="form-check-label" for="sala{{ $sala->id }}">
                                {{ $sala->nome }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Salva Proiezione</button>
            </form>
        </div>
    </div>
</div>
@endsection
