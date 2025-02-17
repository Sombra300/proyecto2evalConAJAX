@extends('partials.layout')
@section('titulo')
{{$player->name}}
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<h1>{{$player->name}}</h1>
@if ($player->avatar=='')
    <img src="{{ asset('img/avatarNotFound.png') }}" alt="avatar de {{$player->name}}" class="avatar">
@else
    <img src="{{ asset('img/jugador/'.$player->avatar) }}" alt="avatar de {{$player->name}}" class="avatar">
@endif
<br>
<h5>{{$player->position}}</h5>

Edad: {{$player->age}}</br>

Twitter: {{$player->twitter}} <br>
Instagram: {{$player->instagram}} <br>
Thitch: {{$player->twitch}} <br>
<br><br>
@if (Auth::user()->rol=='admin')

<div>
</div>
<div>
    <form action="{{route('', )}}" method="post">
        @csrf
        <button type="submit"></button>
    </form>
</div>



    <form action="{{route('players.destroy', ['player'=>$player->id])}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Eliminar">
    </form>

    <a href="{{route('players.edit', $player->id)}}">editar jugador</a>
@endif
@endsection('body')
