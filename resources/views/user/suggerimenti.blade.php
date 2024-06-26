@extends('layouts.master')

@section('title', 'Ti potrebbe interessare..')

@section('body')

<h1>In base alle tue preferenza sui registi ti potrebbero interessare...</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Titolo</th>
            <th>Anno di uscita</th>
            <th></th>
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
        </tr>
        @endforeach
    </tbody>
</table>


<h1>In base alle tue preferenza sui generi ti potrebbero interessare...</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Titolo</th>
            <th>Anno di uscita</th>
            <th></th>
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
        </tr>
        @endforeach
    </tbody>
</table>

@endsection