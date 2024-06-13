@extends('layouts.master')

@section('title', 'Lista Registi')


@section('body')
<div class="row">
            <div class="col-xs-6 d-flex justify-content">
                <p>
                    <a class="btn btn-success" href="{{route('regista.create')}}">
                        <i class="bi bi-database-add"></i>
                        Inserisci nuovo regista</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover table-responsive">
                    <col width='25%'>
                    <col width='25%'>
                    <col width='10%'>
                    <col width='20%'>
                    <col width='20%'>
                    <thead>
                        <tr>
                            <th>Nome </th>
                            <th>Cognome</th>
                            <th># Films</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach($lista_registi as $regista)
                        <tr>
                            <td>{{ $regista->nome }} </td>
                            <td>{{ $regista->cognome }} </td>
                            <td>{{count($regista->films)}} <a href="{{ route('regista.show', ['id' => $regista->id]) }}"><i class="bi bi-caret-right-square"></i></a></td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('regista.edit', $regista->id) }}">
                                    <i class="bi bi-pencil-square"></i> Modifica</a>
                            </td>
                            <td>
                            @if( count($regista->films) == 0)
                                <a class="btn btn-danger" href="{{ route('regista.destroy.confirm', ['id' => $regista->id]) }}"><i class="bi bi-trash"></i> Cancella</a>
                            @else
                                <a class="btn btn-secondary" disabled="disabled" href="#"><i class="bi bi-ban"></i> Cancella</a>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection