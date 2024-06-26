@extends('layouts.master')

@section('title', 'Ti potrebbe interessare..')

@section('body')

<h1>In base alle tue preferenza sui registi ti potrebbero interessare...</h1>

@if(count($suggerimentiByRegista) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Anno di uscita</th>
                <th></th>
                <th>Lo puoi trovare al</th>
                <th>Data e ora</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($suggerimentiByRegista as $suggerimentoFilmReg)
            <tr>
                <td>{{ $suggerimentoFilmReg->titolo }}</td>

                <td>{{ $suggerimentoFilmReg->anno_uscita }}</td>

                <td>
                    <a href="{{ route('mostraFilm.show', ['mostraFilm' => $suggerimentoFilmReg->id]) }}" class="btn btn-primary">Vedi scheda</a>
                </td>

                <td>
                @if(count($suggerimentoFilmReg->proiezioniFuture)>0)
                    @foreach ($suggerimentoFilmReg->proiezioniFuture as $proiezione)
                            Cinema {{ $proiezione->sala->cinema->nome }}
                            <br>
                        @endforeach
                @else
                Al momento non sono previste proiezioni.
                @endif
                </td>

                <td>
                @if(count($suggerimentoFilmReg->proiezioniFuture)>0)  
                @foreach ($suggerimentoFilmReg->proiezioniFuture as $proiezione)
                        {{ $proiezione->data}} alle {{$proiezione->ora}}
                        <br>
                    @endforeach
                @else
                   -
                @endif
                </td>
                
                
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h2>Mi dispiace non sembra esserci nulla che fa al caso tuo :/</h2>
@endif


<h1>In base alle tue preferenza sui generi ti potrebbero interessare...</h1>


@if(count($suggerimentiByGenere) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Anno di uscita</th>
                <th></th>
                <th>Lo puoi trovare al</th>
                <th>Data e ora</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($suggerimentiByGenere as $suggerimentoFilmGen)
            <tr>
                <td>{{ $suggerimentoFilmGen->titolo }}</td>
                <td>{{ $suggerimentoFilmGen->anno_uscita }}</td>
                <td>
                    <a href="{{ route('mostraFilm.show', ['mostraFilm' => $suggerimentoFilmGen->id]) }}" class="btn btn-primary">Vedi scheda</a>
                </td>

                <td>
                @if(count($suggerimentoFilmGen->proiezioniFuture)>0)
                    @foreach ($suggerimentoFilmGen->proiezioniFuture as $proiezione)
                            Cinema {{ $proiezione->sala->cinema->nome }}
                            <br>
                        @endforeach
                @else
                Al momento non sono previste proiezioni.
                @endif
                </td>

                <td>
                @if(count($suggerimentoFilmGen->proiezioniFuture)>0)  
                    @foreach ($suggerimentoFilmGen->proiezioniFuture as $proiezione)
                        {{ $proiezione->data}} alle {{$proiezione->ora}}
                        <br>
                    @endforeach
                @else
                   -
                @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h2>Mi dispiace non sembra esserci nulla che fa al caso tuo :/</h2>
@endif

@endsection