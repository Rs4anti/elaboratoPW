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
                    @foreach ($suggerimentoFilmReg->proiezioni as $proiezione)
                    Cinema {{ $proiezione->sala->cinema->nome }}
                    <br>
                    @endforeach
                </td>

                <td>
                    @foreach ($suggerimentoFilmReg->proiezioni as $proiezione)
                    {{ $proiezione->data }} alle {{ $proiezione->ora }}
                    <br>
                    @endforeach
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
                    @foreach ($suggerimentoFilmGen->proiezioni as $proiezione)
                    Cinema {{ $proiezione->sala->cinema->nome }}
                    <br>
                    @endforeach
                </td>

                <td>
                    @foreach ($suggerimentoFilmGen->proiezioni as $proiezione)
                    {{ $proiezione->data }} alle {{ $proiezione->ora }}
                    <br>
                    @endforeach
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h2>Mi dispiace non sembra esserci nulla che fa al caso tuo :/</h2>
@endif

@endsection