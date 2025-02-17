@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<form action="{{route('login')}}" method="post">
    @csrf
    <label for="email">Correo del usuario</label>
    <input type="text" name="email" id="email" value="{{old('email')}}">
    <br>
    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Enviar">
</form>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@endsection('body')
