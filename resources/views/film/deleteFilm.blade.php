@extends('layouts.master')

@section('title')
    Cancellazione {{ $film->titolo }} dalla lista. Confermi?
@endsection

@section('body')
<div class="container-fluid text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    Cancellazione "{{ $film->titolo }}" dalla lista
                </h1>
            </header>
            <p class="confirm">
                Cancella film. Confermi?
            </p>
        </div>
    </div>
</div>

<div class="container-fluid text-center">
    <div class="row">
        <div class="col-md-6 order-md-2">
            <div class="card border-secondary">
                <div class="card-header">
                    Conferma eliminazione
                </div>
                <div class="card-body">
                    <p>
                        Il film <strong>verrà rimosso in maniera permanente</strong> dal database
                    </p>
                    <form name="film" method="post" action="{{ route('film.destroy', ['film' => $film->id]) }}">
                        @method('DELETE')
                        @csrf
                        <label for="mySubmit" class="btn btn-danger"><i class="bi bi-trash"></i> Cancella</label>
                        <input id="mySubmit" class="d-none" type="submit" value="Cancella">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 order-md-1">
            <div class="card border-secondary">
                <div class="card-header">
                    Annulla
                </div>
                <div class="card-body">
                    <p>
                        Il film <strong>non verrà rimosso</strong> dal database
                    </p>
                    <a class="btn btn-secondary" href="{{ route('film.index') }}"><i class="bi bi-box-arrow-left"></i> Annulla</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
