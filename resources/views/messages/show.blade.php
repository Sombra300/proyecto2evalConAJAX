@extends('partials.layout')
@section('titulo')
{{$message->subject}}
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
autor:{{$message->name}} <br>
asunto:{{$message->subject}}<br>
{{$message->text}}
<br><br>
@if (Auth::user()->rol=='admin')
    <form action="{{route('messages.destroy', ['message'=>$message->id])}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Eliminar">
    </form>

    <a href="{{route('messages.update', $message->id)}}">Marcar como leido</a>
@endif
@endsection('body')
