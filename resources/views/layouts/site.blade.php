<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TURISMO QUILLACOLLO</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{--{{ config('app.name', 'TURISMO QUILLACOLLO') }}--}}
                TURISMO QUILLACOLLO
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/contactanos">HOTELES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contactanos">RESTAURANTES</a>
                    </li>
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">TURISMO</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/circuitoturistico">Circuito Historicos</a>
                            <a class="dropdown-item" href="/circuitoreligioso">Circuito Religioso</a>
                            <a class="dropdown-item" href="/circuitoarqueologico">Circuito Arqueologico</a>
                            <a class="dropdown-item" href="/circuitoecologico">Circuito Ecologico</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">EVENTOS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/circuitoturistico">Religiosos</a>
                            <a class="dropdown-item" href="/circuitoreligioso">Gastronomicos</a>
                            <a class="dropdown-item" href="/circuitoarqueologico">Culturales</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contactanos">CONTACTANOS</a>
                    </li>
                    @guest

                        {{--<li class="nav-item">--}}
                        {{--@if (Route::has('register'))--}}
                        {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        {{--@endif--}}
                        {{--</li>--}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Session') }}
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
        @yield('content')
    </main>
    @include('layouts.footersite')
</div>
</body>
</html>