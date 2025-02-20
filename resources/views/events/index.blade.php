@extends('partials.layout')
@section('titulo')
Proximos eventos
@endsection('titulo')
@section('estilo')
<link rel="stylesheet" href="{{ asset('css/evento.css') }}">
@endsection('estilo')
@section('body')
<h1>Proximos eventos</h1>
<div id="eventojs"></div>

<script src="{{asset("js/eventos.js")}}"></script>
@endsection('body')
