@extends('layouts.master')

@section('title')
Dettaglio regista: {{$regista->nome}} {{$regista->cognome}}
@endsection

@section('body')
<div class="row">
    <div class="col-md-10">
        <div class="row mb-3">
            <div class="col-md-3">
                <b>Cognome:</b>
            </div>
            <div class="col-md-9">
                {{$regista->cognome}}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <b>Nome:</b>
            </div>
            <div class="col-md-9">
                {{$regista->nome}}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <b>Films:</b>
            </div>
            @if($filmAssociati->isEmpty())
                <p>Non ci sono film associati a questo regista.</p>
            @else
                @foreach ($filmAssociati as $film)
                <div class="col-md-9 offset-md-3 mb-2">
                    {{ $film->titolo }} <a href="{{ route('film.show', ['film' => $film->id]) }}"><i class="bi bi-caret-right-square"></i></a>
                </div>            
                @endforeach
            @endif
        </div>
    </div>

    <div class="col-md-2">
        <div class="row mb-3">
            <div class="col-md-12">
                <a class="btn btn-primary w-100" href="{{ route('regista.edit', $regista->id) }}"><i class="bi bi-pencil-square"></i> Edit</a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                @if(count($regista->films) == 0)
                    <a class="btn btn-danger w-100" href="{{ route('regista.destroy.confirm', ['id' => $regista->id]) }}"><i class="bi bi-trash"></i> Delete</a>
                @else
                    <a class="btn btn-secondary w-100" disabled="disabled" href="#"><i class="bi bi-ban"></i> Delete</a>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <a class="btn btn-secondary w-100" href="{{ url()->previous() }}"><i class="bi bi-box-arrow-left"></i> Back</a>
    </div>
        
</div>
@endsection