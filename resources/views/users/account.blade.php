@extends('partials.layout')
@section('titulo')
    {{Auth::user()->name}}
@endsection
@section('estilo')

@endsection
@section('body')
    <div>
        Nombre de usuario: {{Auth::user()->name}} <br>
        Correo: {{Auth::user()->email}} <br>
        Fecha de nacimiento: {{Auth::user()->birthday}} <br>
    </div>
    <div>
        <form action="{{route('users.destroy', ['user'=>Auth::user()->id])}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Eliminar cuenta">
        </form>
    </div>
    <div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </div>
@endsection
