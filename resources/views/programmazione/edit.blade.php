@extends('layouts.master')


@section('title')
    Programmazione: {{$film->titolo}}
@endsection


@section('body')
    @include('film.details')



@endsection