<div class="container">
    <div class="container sticky-top" id="Menu">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href=""><img src="{{ asset('img/logoEquipo.jpeg') }}" alt="logo del equipo" id="imgLogo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link"  href="{{route('index')}}">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  href="{{route('events.index')}}">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="{{route('players.index')}}">Nuestros jugadores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="{{route('locate')}}">Donde estamos</a>
            </li>
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('messages.create')}}">Contacta con nosotros</a>
                </li>
                    @if (Auth::user()->rol=='admin')

                <li class="nav-item">
                    <a class="nav-link"  href="{{route('players.create')}}">Añadir jugador</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('events.create')}}">Añadir evento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('messages.index')}}">Ver mensajes</a>
                </li>
            @endif
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('users.account')}}">Cuenta</a>
                </li>
        @else
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('login')}}">Loguéate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('signup')}}">Regístrarte</a>
                </li>

        @endif

            </ul>
          </div>
        </div>
      </nav>
    </div>

