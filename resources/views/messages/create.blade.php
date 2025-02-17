@extends('partials.layout')
@section('titulo')
¿Que quieres decirnos?
@endsection('titulo')
@section('estilo')
<link rel="stylesheet" href="{{ asset('css/formularios.css') }}">
@endsection('estilo')
@section('body')
<form action="{{route('messages.store')}}" method="post">
    @csrf
    <label for="subject">Tema</label>
    <input type="text" id="subject"name="subject">
    <br>
    <label for="text">Nota</label>
    <input type="text" id="text"name="text">
    <br>
    <input type="submit" value="Guardar">
</form>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@endsection('body')
