@extends('partials.layout')
@section('titulo')
{{$event->name}}
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<h1>{{$event->name}}</h1>
<h2>{{$event->description}}</h2>
<h2>Localización: {{$event->location}}</h2>
<div>
    {{$event->date}}
    {{$event->hour}}
</div>
<br><br>
<div>
    @if($event->likedByUser(Auth::id()))
        <form action="{{ route('likes.destroy', $event->likes->where('user_id', Auth::id())->first()->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" style="border: none; background: none;">
                <img src="{{ asset('img/likes/like.png') }}" alt="Dar Like" class="like">
            </button>
        </form>
    @else
        <form action="{{ route('likes.store') }}" method="POST" style="display: inline;">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <button type="submit" style="border: none; background: none;">
                <img src="{{ asset('img/likes/like_por_dar.png') }}" alt="Quitar Like" class="like">
            </button>
        </form>
    @endif
</div>
<br><br>
@if (Auth::check() && Auth::user()->rol=='admin')
    <form action="{{route('events.destroy', ['event'=>$event->id])}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Eliminar">
    </form>

    <a href="{{route('events.edit', $event->id)}}">editar evento</a>
@endif
<script src="{{asset("js/eventos.js")}}"></script>
@endsection('body')
