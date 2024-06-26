@extends('layouts.master')

@section('title', 'Ti potrebbe interessare..')

@section('body')

<h1>In base alle tue preferenza sui registi ti potrebbero interessare...</h1>
@foreach ($filmsByRegista as $film)

<li>Film: {{$film}}</li>
    

@endforeach

<h1>In base alle tue preferenza sui generi ti potrebbero interessare...</h1>
@foreach ($filmsByGenere as $film)
    <li>Film: {{$film}}</li>

@endforeach




@endsection