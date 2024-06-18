@extends('layouts.master')

@section('title', 'Lista Registi')


@section('body')
<script>
    $(document).ready(function(){
        // Searching feature
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();

            var column = $("#searchInput").attr("data-column");

            $("#tabellaRegisti tbody tr").each(function() {
                var found = false;
                
                $(this).find("td").slice(0, -3).each(function() { // Escludi le ultime tre colonne
                    var text = $(this).text().toLowerCase();
                    if (text.indexOf(value) > -1) {
                        found = true;
                    }
                });
                $(this).toggle(found);
            });
        });
    });
</script>

<div class="row">
    <div class="input-group mb-3">
        <input type="text" id="searchInput" class="form-control" aria-label="Text input" placeholder="Cerca regista...">
    </div>
</div>

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
                <table id="tabellaRegisti" class="table table-striped table-hover table-responsive">
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