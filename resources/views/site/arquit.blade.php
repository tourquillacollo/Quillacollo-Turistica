<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Turismo Quillacollo</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">TURISMO QUILLACOLLO</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <li class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lugares</a>--}}
                {{--<div class="dropdown-menu">--}}
                {{--<a class="dropdown-item" href="/circuitoturistico">Circuito Turistico</a>--}}
                {{--<a class="dropdown-item" href="/circuitoarquitectonico">Circuito Arquitectinico</a>--}}
                {{--<a class="dropdown-item" href="/circuitoarqueologico">Circuito Arqueologico</a>--}}
                {{--</div>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a class="nav-link"" href="/circuitoturistico">Circuito Turistico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"" href="/circuitoarquitectonico">Circuito Arquitectinico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"" href="/circuitoarqueologico">Circuito Arqueologico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/eventos">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contactanos</a>
                </li>

                @if (Route::has('login'))
                    <li class="nav-item">
                        @auth
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">Login</a>

                        @endauth
                    </li>
                @endif
            </ul>
    </div>
</nav>


<div class="container" id="app">
    <br><br><br>
    <list-circuitoarquitectonico-component></list-circuitoarquitectonico-component>
</div>

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Turismo Quillacollo 2018</p>
    </div>
    <!-- /.container -->
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>