@extends('layouts.master')

@section('title', 'RISORSA NON TROVATA')

@section('body')

<div class="container-fluid text-center">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-danger">
                <div class='card-header'>
                    <b>Illegal page access:</b> something <strong>wrong</strong> happened while accessing this page!
                </div>
                <div class='card-body'>
                    <p>{{ $message }}</p>
                    <p><a class="btn btn-danger" href="{{ route('home') }}"><i class="bi bi-box-arrow-left"></i> Back to home!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection