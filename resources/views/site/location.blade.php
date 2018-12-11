<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Turismo Quillacollo</title>

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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lugares</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Circuito Turistico</a>
                                <a class="dropdown-item" href="#">Circuito Arquitectinico</a>
                                <a class="dropdown-item" href="#">Circuito Arqueologico</a>
                            </div>
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

        <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active">
                        <img src="{{ asset('/images/image_1.jpg') }}"  alt="image1">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>First Slide</h3>
                            <p>This is a description for the first slide.</p>
                        </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item">
                        <img src="{{ asset('/images/image_2.jpg') }}" alt="image3">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Third Slide</h3>
                            <p>This is a description for the third slide.</p>
                        </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item">
                        <img src="{{ asset('/images/image_3.jpg') }}" alt="image3">

                        <div class="carousel-caption d-none d-md-block">
                            <h3>Third Slide</h3>
                            <p>This is a description for the third slide.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <div class="container">

            <h1 class="my-4">Bienvenidos a Turismo en Quillacollo</h1>

            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <h4 class="card-header">PARQUE ECOTURISTICO CHOCAYA</h4>
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">Saber Mas</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <h4 class="card-header">CORDILLERA DEL TUNARI</h4>
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">Saber Mas</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <h4 class="card-header">AGUAS TERMALES LIRIUNI</h4>
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">Saber Mas</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Portfolio Section -->
            <h2>Portfolio Heading</h2>

            <div class="row">
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Project One</a>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Project Two</a>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Project Three</a>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Project Four</a>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Project Five</a>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Project Six</a>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Features Section -->
            <div class="row">
                <div class="col-lg-6">
                    <h2>Modern Business Features</h2>
                    <p>The Modern Business template by Start Bootstrap includes:</p>
                    <ul>
                        <li>
                            <strong>Bootstrap v4</strong>
                        </li>
                        <li>jQuery</li>
                        <li>Font Awesome</li>
                        <li>Working contact form with validation</li>
                        <li>Unstyled page elements for easy customization</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Call to Action Section -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
                </div>
            </div>

        </div>
        <!-- /.container -->

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
