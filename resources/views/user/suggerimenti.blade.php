@extends('layouts.master')

@section('title', 'Ti potrebbe interessare..')

@section('body')

<h1>In base alle tue preferenza sui registi ti potrebbero interessare...</h1>

@if(count($filmsByRegista) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Anno uscita</th>
                <th></th>
                <th>Cinema</th>
                <th>Data</th>
                <th>Ora</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filmsByRegista as $film)
            <td>{{$film->titolo}}</td>
            <td>{{$film->anno_uscita}}</td>

            <td>
                    <a href="{{ route('mostraFilm.show', ['mostraFilm' => $film->id]) }}" 
                    class="btn btn-primary">Vedi scheda</a>
            </td>

            <td>
                @if(count($film->proiezioniFuture)>0)
                    @foreach($film->proiezioniFuture as $proiezione)
                    {{$proiezione->sala->cinema->nome}}
                    @endforeach
                @else
                    Al momento non sono previste proiezioni.
                @endif
            </td>

            <td>
                @if(count($film->proiezioniFuture)>0)
                    @foreach($film->proiezioniFuture as $proiezione)
                    {{$proiezione->data}}
                    @endforeach
                @else
                    -
                @endif
            </td>

            <td>
                @if(count($film->proiezioniFuture)>0)
                    @foreach($film->proiezioniFuture as $proiezione)
                    {{$proiezione->ora}}
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

@if(count($filmsByGenere) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Anno uscita</th>
                <th></th>
                <th>Cinema</th>
                <th>Data</th>
                <th>Ora</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filmsByGenere as $film)
            <td>{{$film->titolo}}</td>
            <td>{{$film->anno_uscita}}</td>

            <td>
                    <a href="{{ route('mostraFilm.show', ['mostraFilm' => $film->id]) }}" 
                    class="btn btn-primary">Vedi scheda</a>
            </td>

            <td>
                @if(count($film->proiezioniFuture)>0)
                    @foreach($film->proiezioniFuture as $proiezione)
                    {{$proiezione->sala->cinema->nome}}
                    @endforeach
                @else
                    Al momento non sono previste proiezioni.
                @endif
            </td>

            <td>
                @if(count($film->proiezioniFuture)>0)
                    @foreach($film->proiezioniFuture as $proiezione)
                    {{$proiezione->data}}
                    @endforeach
                @else
                    -
                @endif
            </td>

            <td>
                @if(count($film->proiezioniFuture)>0)
                    @foreach($film->proiezioniFuture as $proiezione)
                    {{$proiezione->ora}}
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