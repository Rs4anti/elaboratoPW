@extends('layouts.master')

@section('title')
    Conferma cancellazione proiezione {{ $film->titolo }} al cinema {{ $cinema->nome }}.
@endsection

@section('body')
<div class="container-fluid text-center my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">

                <div class="col-md-6">
                    <div class="card border-danger mb-4">
                        <div class="card-header bg-danger text-white">
                            <h4><i class="bi bi-exclamation-triangle-fill"></i> Attenzione</h4>
                        </div>
                        <div class="card-body">
                            <p class="lead">
                                Stai per cancellare la proiezione del film <strong><i>{{ $film->titolo }}</i></strong> del <strong>{{ $proiezione->data }}</strong> alle <strong>{{ $proiezione->ora }}</strong>.
                            </p>
                            <p>
                                Sala: <strong>{{ $sala->nome }}</strong><br>
                                Cinema: <strong>{{ $cinema->nome }}</strong>
                            </p>
                            <img src="{{asset('storage/' . $film->path_locandina)}}" alt="Locandina del film {{ $film->titolo }}" class="img-fluid mb-3">
                            <p>
                                <strong>Confermi?</strong>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-secondary mb-4">
                        <div class="card-header  bg-danger text-white">
                            Conferma Eliminazione
                        </div>
                        <div class="card-body">
                            <p>
                                La proiezione verrà rimossa in maniera permanente.
                            </p>
                            <form name="proiezione" method="post" action="{{ route('programmazione.destroy', ['programmazione' => $proiezione->id]) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Cancella</button>
                            </form>
                        </div>
                    </div>

                    <div class="card border-secondary">
                        <div class="card-header bg-secondary text-white">
                            Annulla
                        </div>
                        <div class="card-body ">
                            <p>
                                La proiezione del film <strong>{{ $film->titolo }}</strong> non verrà rimossa.
                            </p>
                            <a class="btn btn-secondary" href="{{ route('film.index') }}"><i class="bi bi-box-arrow-left"></i> Annulla</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
