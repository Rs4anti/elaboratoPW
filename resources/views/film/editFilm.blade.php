@extends('layouts.master')

@section('title')
@if(isset($film->id))
    MODIFICA:: {{$film->titolo}}
@else
    Aggiunta di un nuovo film
@endif
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
    @if(isset($film->id))
        <form class="form-horizontal" name="film" method="post" action="{{ route('film.update', ['film' => $film->id]) }}">
        @method('PUT')
    @else
        <form class="form-horizontal" name="film" method="post" action="{{ route('film.store') }}">
    @endif
        @csrf


        <!--gestione locandina
    <div class="form-group row mb-3">
        <label for="locandina" class="col-md-2 col-form-label">Locandina</label>
        <div class="col-md-10">
            @if(isset($film->locandina))
                <div class="mb-2">
                    <img src="#" alt="Locandina" style="width: 150px;">
                </div>
                <div>
                    <input type="file" class="form-control" name="locandina" id="locandina">
                </div>
                <div class="mt-2">
                    <a href="{{ route('films.removeLocandina', $film->id) }}" class="btn btn-danger">Elimina Locandina</a>
                </div>
            @else
                <input type="file" class="form-control" name="locandina" id="locandina">
            @endif
        </div>
    </div>
    -->

        <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label for="titolo">Titolo</label>
                </div>
                <div class="col-md-10">
                    @if(isset($film->id))
                        <input class="form-control" type="text" name="titolo" value="{{ $film->titolo }}"/>
                    @else
                        <input class="form-control" type="text" name="titolo"/>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label for="registi">Regia</label>
                </div>
                <div class="col-md-10">
                    <select class="form-control" multiple="multiple" name="registi[]">
                    @foreach($registi as $regista)
                        @if((isset($film->id))&&($film->registi->contains($regista)))
                            <option value="{{ $regista->id }}" selected="selected">{{ $regista->nome}} {{$regista->cognome}}</option>
                        @else
                            <option value="{{ $regista->id }}">{{ $regista->nome }} {{$regista->cognome}}</option>
                        @endif
                    @endforeach                    
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label for="trama">Trama</label>
                </div>
                <div class="col-md-10">
                    @if(isset($film->id))
                        <textarea class="form-control" name="trama" rows="5">{{ $film->trama }}</textarea>
                    @else
                        <textarea class="form-control" name="trama" rows="5"></textarea>
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
                                <label class="form-check-label" value="{{ $genere->id }}">
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
                    <label for="durata">Durata [minuti]</label>
                </div>
                <div class="col-md-10">
                    @if(isset($film->id))
                        <input class="form-control" type="text" name="durata" value="{{ $film->durata }}"/>
                    @else
                        <input class="form-control" type="text" name="durata"/>
                    @endif
                </div>
            </div>            

            <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label for="anno_uscita">Anno</label>
                </div>
                <div class="col-md-10">
                    @if(isset($film->id))
                        <input class="form-control" type="text" name="anno_uscita" value="{{ $film->anno_uscita }}"/>
                    @else
                        <input class="form-control" type="text" name="anno_uscita"/>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label for="lingueAudio">Lingua audio</label>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        @foreach($lingueAudio as $lingua)
                            <div class="col-md-4 col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingueAudio[]" value="{{ $lingua->id }}" id="lingua_{{ $lingua->id }}"
                                    @if((isset($film->id)) && ($film->lingueAudio->contains($lingua)))
                                        checked
                                    @elseif($lingua->lingua == 'Italiano') checked
                                    @endif
                                    >
                                    <label class="form-check-label" value="{{ $lingua->id }}">
                                        {{ $lingua->lingua }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label for="lingueSub">Lingua sottotitoli</label>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        @foreach($lingueSub as $sub)
                            <div class="col-md-4 col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingueSub[]" value="{{ $sub->id }}" id="lingua_{{ $sub->id }}"
                                    @if((isset($film->id)) && ($film->sottotitoli->contains($sub)))
                                        checked
                                    @elseif($sub->lingua == 'nessuna') checked
                                    @endif
                                    >
                                    <label class="form-check-label" value="{{ $sub->id }}">
                                        {{ $sub->lingua }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
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
                    <a class="btn btn-danger w-100" href="{{ route('film.index') }}"><i class="bi bi-box-arrow-left"></i> Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection