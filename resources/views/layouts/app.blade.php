<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mediaciones') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h2><img src="{{asset('/jpg/medi.jpg')}}" width="60" height="70" /><p class="text-primary">S.G.M.</h2></p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="btn btn-success" href="{{ route('personas.create')}}">PERSONAS</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="btn btn-success" href="{{ route('abogados.create')}}">ABOGADOS</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="btn btn-success" href="{{ route('expedientes.create')}}">EXPEDIENTES</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="btn btn-success" href="{{ route('mediaciones.create')}}">MEDIACIONES</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="btn btn-success" href="{{ route('manejoDeFondos.create')}}">FONDOS</a>
                        </li>
                    </ul>


                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle"
                                data-toggle="dropdown">
                          LISTADOS <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('personas.index')}}">PERSONAS</a></li>
                          <li><a href="{{route('abogados.index')}}">ABOGADOS</a></li>
                          <li><a href="{{route('juzgados.index')}}">JUZGADOS</a></li>
                          <li><a href="{{route('expedientes.index')}}">EXPEDIENTES</a></li>
                          <li><a href="{{route('mediaciones.index')}}">MEDIACIONES</a></li>
                          <li><a href="{{route('manejoDeFondos.index')}}">FONDOS</a></li>
                        </ul>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="row">
                @auth
                <div class="col-sm-2">
                 <ul class="navbar-nav">
                FORMULARIOS Y NORMAS
                <li class="nav-item">
                    <a class="nav-link" href="https://www2.justucuman.gov.ar/centromediacion/images/Decreto%20Reglamentario%202960-2009.doc">Decreto Regkamentario N°2960/09</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www2.justucuman.gov.ar/centromediacion/images/ley7844ymodif.pdf">Ley Provincial7.844</a>
                </li>
                <li class="dropdown-divider"></li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www2.justucuman.gov.ar/centromediacion/images/requerimiento.doc">Requerimeinto de Mediacion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www2.justucuman.gov.ar/centromediacion/images/Acuerdo%20para%20someter%20una%20causa%20ya%20judicializada%20a%20mediaci%C3%B3n%20(03-05-12).doc">Mediación por Acuerdo de partes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www2.justucuman.gov.ar/centromediacion/images/Ficha%20de%20datos%20(02-03-12).doc">Ficha de Datos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www2.justucuman.gov.ar/centromediacion/images/Aceptaci%C3%B3n%20de%20cargo%20(02-03-12).doc">Aceptación de Cargo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www2.justucuman.gov.ar/centromediacion/images/Fijaci%C3%B3n%20de%20fecha%20de%20audiencia%20(02-03-12).doc">Fijacion de Audiencia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www2.justucuman.gov.ar/centromediacion/images/Acta%20de%20audiencia%20(02-03-12).doc">Acta de Audiencia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www2.justucuman.gov.ar/centromediacion/images/Convenio%20de%20confidencialidad%20(02-03-12).doc">Convenio de Confidencialidad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www2.justucuman.gov.ar/centromediacion/images/Acta%20de%20cierre%20sin%20acuerdo%20(art.%2019)%20(02-03-12).doc">Acta de Cierre sin Acuerdo</a>
                </li>
                </ul>
            </div>
            @endauth
            <div class="col-sm-2 col-lg-10">
                @yield('content')
            </div>
        </div>
        </main>

    </div>
</body>
</html>
