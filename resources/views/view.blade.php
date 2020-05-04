@extends('welcome')
@section('title',"Vista titulo")


@section('content')
<h1>Hello {{$name}}</h1>
@endsection

@section('sidebar')
@parent
    <h3>Este es mi sidebar</h3>
@endsection
