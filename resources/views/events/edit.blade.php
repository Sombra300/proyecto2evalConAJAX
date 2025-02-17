@extends('partials.layout')
@section('titulo')
Evitar evento {{$event->name}}
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<form action="{{route('events.store')}}" method="post">
    @csrf
    <label for="name">Nombre</label>
    <input type="text" id="name" name="name" value="{{$event->name}}">
    <br>
    <label for="description">Descripcion</label>
    <input type="text" id="description" name="description" value="{{$event->description}}">
    <br>
    <label for="location">localizacion</label>
    <input type="text" id="location" name="location" value="{{$event->location}}">
    <br>
    <label for="date">Fecha</label>
    <input type="date" id="date" name="date" value="{{$event->date}}">
    <br>
    <label for="hour">Hora</label>
    <input type="time" id="hour" name="hour" value="{{$event->hour}}">
    <br>
    <label for="type">Tipo</label>
    <select name="type" id="type" value="{{$event->type}}">
        <option value="official">Official</option>
        <option value="exhibition">Exhibition</option>
        <option value="charity">Charity</option>
    </select>
    <br>
    <label for="tags">Etiquetas</label>
    <input type="text" id="tags" name="tags" value="{{$event->tags}}">
    <br>
    <label for="visible">Visibilidad</label>
    <select id="visible" name="visible" value="{{$event->visible}}">
        <option value="0">Oculto</option>
        <option value="1">Visible</option>
    </select>
    <br>
    <input type="button" value="Guardar">
</form>
@endsection('body')

