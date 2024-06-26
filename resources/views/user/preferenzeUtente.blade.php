@extends('layouts.master')

@section('title', 'Le tue preferenze')

@section('body')

<div class="row">
        <div class="col-md-12">
        @if($preferenze)
            <form class="form-horizontal" name="film" method="post" action="#"  enctype="multipart/form-data">
            @method('PUT')
        @else
            <form class="form-horizontal" name="film" method="post" action="#"  enctype="multipart/form-data">
        @endif
            @csrf

            @php
            echo($preferenze);
            @endphp

                <div class="form-group row mb-3">
                    <div class="col-md-2">
                        <label for="registi">Registi Preferiti</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" multiple="multiple" name="registi[]">
                        @foreach($registi as $regista)
                            @if($registiPreferiti->contains($regista))
                                <option value="{{ $regista->id }}" selected="selected">{{ $regista->nome}} {{$regista->cognome}}</option>
                            @else
                                <option value="{{ $regista->id }}">{{ $regista->nome }} {{$regista->cognome}}</option>
                            @endif
                        @endforeach              
                        </select>
                        <span class="invalid-input" id="invalid-regista"></span>  
                    </div>
                </div>

        <div class="form-group row mb-3">
            <div class="col-md-2">
                <label for="generi">Generi preferiti</label>
            </div>
                <div class="col-md-10">
                    <div class="row">
                        @foreach($generi as $genere)
                            <div class="col-md-4 col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="generi[]" value="{{ $genere->id }}"
                                    @if($generiPreferiti->contains($genere))
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" value="{{ $genere->id }}">
                                        {{ $genere->nome }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        <span class="invalid-input" id="invalid-genere"></span>
                    </div>
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
                        <a class="btn btn-danger w-100" href="{{ route('home') }}"><i class="bi bi-box-arrow-left"></i> Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>





@endsection