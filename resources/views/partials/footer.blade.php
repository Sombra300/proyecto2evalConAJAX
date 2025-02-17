<footer>
    <div class="container-fluid p-5 text-center" id="Pie">
      <div class="row">
        <div class="col">Los perdidos lejanos</div>
        <div class="col">Desarrollado por Eloy</div>
        <div class="col">
            <a href="{{route('terms')}}">Terminos y Condiciones</a>
        </div>
        <div class="col">
            <a href="{{route('privacy')}}">Politicas de privacidad</a>
        </div>
        <div class="col">
            @if (Auth::check() && Auth::user()->rol=='admin')
                <a href="{{route('messages.index')}}">Contacta con nosotros</a>
            @else
                <a href="{{route('messages.create')}}">Contacta con nosotros</a>
            @endif
        </div>
      </div>
    </div>
  </footer>
