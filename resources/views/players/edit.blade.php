@extends('partials.layout')
@section('titulo')
Editar jugador: {{$player->name}}
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<form action="{{route('players.store')}}" method="post">
    @csrf
    <label for="name">Nombre</label>
    <input type="text" id="name"name="name" value="{{$player->name}}">
    <br>
    <label for="twitter">twitter</label>
    <input type="text" id="twitter"name="twitter" value="{{$player->twitter}}">
    <br>
    <label for="instagram">instagram</label>
    <input type="text" id="instagram"name="instagram" value="{{$player->instagram}}">
    <br>
    <label for="twitch">twitch</label>
    <input type="text" id="twitch"name="twitch" value="{{$player->twitch}}">
    <br>
    <label for="avatar">avatar</label>
    <input type="text" id="avatar" name="avatar" value="{{$player->avtara}}">
    <br>
    <label for="visible">Visibilidad</label>
    <select name="visible" id="visible" value="{{$player->visible}}">
        <option value="0">Oculto</option>
        <option value="1">Visible</option>
    </select>
    <br>
    <input type="button" value="Guardar">
</form>
@endsection('body')
