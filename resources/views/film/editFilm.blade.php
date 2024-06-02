@extends('layouts.master')

@section('title')
@if(isset($film->id))
    MODIFICA {{$film->titolo}}
@else
    Aggiunta di un nuovo film
@endif
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
        @if(isset($film->id)) <!--SONO IN MODIFICA DI UN FILM!!-->
            <form class="form-horizontal" name="film" method="post" action="#"> <!--FARE ROUTE 'film.update' (metodo update nel filmController)-->
            
            <!--<input type="hidden" name="_method" value="PUT">-->
            @method('PUT')
        @else  <!--SONO IN AGGIUNTA DI UN FILM!!--> <!--FARE ROUTE 'film.store' (metodo store nel filmController)-->
            <form class="form-horizontal" name="film" method="post" action="#">
        @endif
        @csrf

        <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label for="title">Titolo</label>
                </div>
                <div class="col-md-10">
                    @if(isset($film->id))
                        <input class="form-control" type="text" name="title" value="{{ $film->titolo }}"/>
                    @else
                        <input class="form-control" type="text" name="title"/>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label for="author_id">Regia</label>
                </div>
                <div class="col-md-10">
                    <select class="form-control" multiple="multiple" name="registi[]">
                    @foreach($registi as $regista)
                        @if((isset($film->id))&&($film->registi->contains($regista)))
                            <option value="{{ $regista->id }}" selected="selected">{{ $regista->nome }}</option>
                        @else
                            <option value="{{ $regista->id }}">{{ $regista->nome }}</option>
                        @endif
                    @endforeach                    
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label for="tama">Trama</label>
                </div>
                <div class="col-md-10">
                    @if(isset($film->id))
                        <textarea class="form-control" name="trama" rows="5">{{ $film->trama }}</textarea>
                    @else
                        <input class="form-control" type="text" name="trama"/>
                    @endif
                </div>
            </div>


            <div class="form-group row mb-3">
    <div class="col-md-2">
        <label for="generi">Generi</label>
    </div>
    <div class="col-md-10">
        <div class="row">
            @foreach($generi as $genere)
                <div class="col-md-4 col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="generi[]" value="{{ $genere->id }}" id="genere_{{ $genere->id }}"
                        @if((isset($film->id)) && ($film->generi->contains($genere)))
                            checked
                        @endif
                        >
                        <label class="form-check-label" for="genere_{{ $genere->id }}">
                            {{ $genere->nome }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


            <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label for="anno">Anno</label>
                </div>
                <div class="col-md-10">
                    @if(isset($film->id))
                        <input class="form-control" type="text" name="anno" value="{{ $film->anno_uscita }}"/>
                    @else
                        <input class="form-control" type="text" name="title"/>
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
                    <a class="btn btn-danger w-100" href="{{ route('film.index') }}"><i class="bi bi-box-arrow-left"></i> Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection