@extends('partials.layout')
@section('titulo')
Nuestros Jugadores
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
    <div class="container">
        <h1 class="text-center my-4">Nuestros Jugadores</h1>
        <div class="row">
            @forelse ($players as $player)
                @if ($player->visible==0)
                    @if (Auth::check() && Auth::user()->rol=='admin')
                    <div class="col-sm-12 col-md-6 col-lg-3 mb-4 d-flex align-items-stretch">
                        <div class="card w-100">
                            @if ($player->avatar == '')
                                <img src="{{ asset('img/avatarNotFound.png') }}" alt="Avatar de {{$player->name}}" class="card-img-top">
                            @else
                                <img src="{{ asset('img/jugador/'.$player->avatar) }}" alt="Avatar de {{$player->name}}" class="card-img-top">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="nombreJugador">{{$player->name}}</h5>
                                <p>{{$player->name}}</p>
                                @if (Auth::check())
                                    <a href="{{route('players.show',$player->id)}}" class="btn btn-primary">Ver Perfil</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                @else
                <div class="col-sm-12 col-md-6 col-lg-3 mb-4 d-flex align-items-stretch">
                    <div class="card w-100">
                        @if ($player->avatar == '')
                            <img src="{{ asset('img/avatarNotFound.png') }}" alt="Avatar de {{$player->name}}" class="card-img-top">
                        @else
                            <img src="{{ asset('img/jugador/'.$player->avatar) }}" alt="Avatar de {{$player->name}}" class="card-img-top">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{$player->name}}</h5>
                            @if (Auth::check())
                                <a href="{{ route('players.show', $player->id) }}" class="btn btn-primary">Ver Perfil</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            @empty
                <div class="col-12 text-center">
                    <p>No hay jugadores</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
