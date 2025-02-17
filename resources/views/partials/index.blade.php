@extends('partials.layout')
@section('titulo')
Bienvenido a Los Perdidos Lejanos
@endsection('titulo')
@section('estilo')
<link rel="stylesheet" href="{{ asset('css/logo.css') }}">
@endsection('estilo')
@section('body')


<div class="container">
    <div class="row">
        <div class="container col-12 d-flex justify-content-center align-items-center vh-100">
            <div class="d-flex justify-content-center align-items-center vh-100 image-container">
                <img src="{{ asset('img/logoEquipo.jpeg') }}" alt="logo del equipo los perdidos lejanos" class="default-img img-fluid">
                <img src="{{ asset('img/logoEquipo2.jpeg') }}" alt="logo del equipo los perdidos lejanos" class="hover-img img-fluid">
            </div>
        </div>
        <div class="container col-12 ">
            <h1>Bienvenido a Los Perdidos Lejanos</h1>
            <p>
                Los Perdidos Lejanos – Desde el Punto Nemo, para el mundo <br>
                En el corazón del océano, donde la civilización es solo un eco lejano y las aguas esconden secretos insondables, surge un equipo que desafía las distancias y las probabilidades. Somos Los Perdidos Lejanos, un equipo de esports con una base única: el Punto Nemo, el lugar más remoto del planeta.
            <br>
            <br>
                Aquí, a miles de kilómetros de la tierra firme más cercana, hemos forjado nuestro estilo de juego en la soledad del océano. Sin distracciones, sin interferencias, solo la pasión por la competencia y la determinación de demostrar que no importa cuán lejos estés, siempre puedes alcanzar la cima. Nuestra conexión es más fuerte que la distancia, y nuestra sinergia se nutre del aislamiento, convirtiéndolo en nuestra mayor fortaleza.
            <br>
            <br>
                Un equipo sin fronteras <br>
                Los Perdidos Lejanos no solo representan un lugar en el mapa, sino una mentalidad: la de aquellos que no temen perderse en el camino hacia la grandeza. Enfrentamos cada torneo con la convicción de que la victoria no está en la proximidad, sino en la preparación, la estrategia y el trabajo en equipo.
            <br>
            <br>
                Con jugadores especializados en los títulos más exigentes del mundo de los esports, dominamos cada partida como si cada movimiento fuera una travesía en aguas desconocidas. FPS, MOBAs, Battle Royales... No importa el juego, sabemos navegarlo con la precisión de un capitán experimentado.
            <br>
            <br>
                Nuestra misión: conquistar desde el olvido <br>
                Si algo nos define es la capacidad de convertir el aislamiento en motivación. Donde otros ven un punto perdido en el océano, nosotros vemos nuestra fortaleza. Donde otros ven una barrera, nosotros encontramos un desafío a superar.
            <br>
            <br>
                Cada competencia es un faro en la distancia, una señal de que estamos aquí para dejar huella en la historia de los esports. Porque en Los Perdidos Lejanos no creemos en los límites. Creemos en la gloria.
            <br>
            <br>
                🌊 Desde el Punto Nemo, para el mundo. 🌊
            </p>
        </div>
    </div>
</div>

@endsection('body')

