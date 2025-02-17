@extends('partials.layout')
@section('titulo')
Añade un jugador
@endsection('titulo')
@section('estilo')
<link rel="stylesheet" href="{{ asset('css/formularios.css') }}">
@endsection('estilo')
@section('body')
<div class="form-container">
    <form action="{{route('players.store')}}" method="post">
        @csrf
        <label for="name">Nombre</label>
        <input type="text" id="name"name="name">
        <br>
        <label for="age">age</label>
        <input type="text" id="age"name="age">
        <br>
        <label for="twitter">twitter</label>
        <input type="text" id="twitter"name="twitter">
        <br>
        <label for="instagram">instagram</label>
        <input type="text" id="instagram"name="instagram">
        <br>
        <label for="twitch">twitch</label>
        <input type="text" id="twitch"name="twitch">
        <br>
        <label for="avatar">avatar</label>
        <input type="text" id="avatar" name="avatar">
        <br>
        <label for="position">Posicion</label>
        <input type="text" id="position" name="position">
        <br>
        <label for="visible">Visibilidad</label>
        <select name="visible" id="visible">
            <option value="0">Oculto</option>
            <option value="1">Visible</option>
        </select>
        <br>
        <input type="submit" value="Guardar">
    </form>
</div>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@endsection('body')
