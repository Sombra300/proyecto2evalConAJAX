@extends('partials.layout')
@section('titulo')
Proximos eventos
@endsection('titulo')
@section('estilo')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection('estilo')
@section('body')
<h1>Proximos eventos</h1>
<div id="eventojs"></div>

<script src="{{asset("js/eventos.js")}}"></script>
@endsection('body')
