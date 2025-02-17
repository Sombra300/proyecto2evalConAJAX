@extends('partials.layout')
@section('titulo')
mensajes
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<h1>mensajes pendientes</h1>
@forelse ($messages as $message)
    <div>
        <a href="{{route('messages.show',$message->id)}}">{{$message->name}}</a>
        <br>
    </div>

@empty
No hay mensajes
@endforelse
@endsection('body')
