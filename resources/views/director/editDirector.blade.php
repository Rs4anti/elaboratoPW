@extends('layouts.master')

@section('title')
    @if(isset($regista->id))
        Modifica {{$regista->nome}} {{$regista->cognome}}
    @else
        Inserimento nuovo regista
    @endif
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
    @if(isset($regista->id))
        <form class="form-horizontal" name="regista" method="post" action="{{ route('regista.update', ['id' => $regista->id]) }}">
            @method('PUT')
    @else
        <form class="form-horizontal" name="regista" method="post" action="{{ route('regista.store') }}">
    @endif
    @csrf
    
        <div class="form-group row mb-3">
            <div class="col-md-2">
                <label for="title">Nome</label>
            </div>
            <div class="col-md-10">
                @if(isset($regista->id))
                    <input class="form-control" type="text" name="nomeRegista" placeholder="nome" value="{{ $regista->nome }}"/>
                @else
                    <input class="form-control" type="text" name="nomeRegista"/>
                @endif
            </div>
        </div>
        <div class="form-group row mb-3">
            <div class="col-md-2">
                <label for="title">Cognome</label>
            </div>
            <div class="col-md-10">
                @if(isset($regista->id))
                    <input class="form-control" type="text" name="cognomeRegista" placeholder="cognome" value="{{ $regista->cognome }}"/>
                @else
                    <input class="form-control" type="text" name="cognomeRegista"/>
                @endif
            </div>
        </div>
        <div class="form-group row mb-3">
            <div class="col-md-10 offset-md-2">
                <label for="mySubmit" class="btn btn-primary w-100"><i class="bi bi-floppy2-fill"></i> Save</label>
                <input id="mySubmit" class="d-none" type="submit" value="Save">
            </div>
        </div>
        <div class="form-group row mb-3">
            <div class="col-md-10 offset-md-2">
                <a class="btn btn-danger w-100" href="{{ route('regista.index') }}"><i class="bi bi-box-arrow-left"></i> Cancel</a>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection