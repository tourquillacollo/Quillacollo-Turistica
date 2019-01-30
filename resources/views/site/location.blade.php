@extends('layouts.site')

@section('content')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active">
                    <img src="{{ asset('/images/Imagen_1hd.jpg') }}"  alt="image1">
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h3>First Slide</h3>--}}
                        {{--<p>This is a description for the first slide.</p>--}}
                    {{--</div>--}}
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item">
                    <img src="{{ asset('/images/Imagen_2hd.jpg') }}" alt="image2">
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h3>Third Slide</h3>--}}
                        {{--<p>This is a description for the third slide.</p>--}}
                    {{--</div>--}}
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item">
                    <img src="{{ asset('/images/Imagen_3hd.jpg') }}" alt="image3">

                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h3>Third Slide</h3>--}}
                        {{--<p>This is a description for the third slide.</p>--}}
                    {{--</div>--}}
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/images/Imagen_4hd.jpg') }}" alt="image4">

                    {{--<div class="carousel-caption d-none d-md-block">--}}
                    {{--<h3>Third Slide</h3>--}}
                    {{--<p>This is a description for the third slide.</p>--}}
                    {{--</div>--}}
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
    <div class="container-fluid">
        <br><br>

        <!-- Image Showcases -->
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row no-gutters">

                    <div class="col-lg-6 order-lg-2 text-white showcase-img">
                        <img src="{{ asset('/images/img_history.jpg') }}" alt="image3" width="550">
                    </div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Historia</h2>
                        <hr>
                        <p class="lead mb-0">
                            El Origen de Quillacollo se remonta a mucho antes del 14 de septiembre de 1905, fecha en la que durante la presidencia de Ismael Montes se promulgó una ley por la que entonces la provincia  Tapacarí se divide en dos, dando origen a Quillacollo con su capital del mismo nombre y conformada por dos secciones.
                        </p>
                        <a href="#">Quiero saber mas</a>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 text-white showcase-img">
                        <img src="{{ asset('/images/quilla_1.jpg') }}" alt="image3" width="550">
                    </div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>Fundacion</h2>
                        <hr>
                        <p class="lead mb-0">
                            La Provincia de Quillacollo fue fundada  el 14 de septiembre de 1593, por Juan Solíz y Francisco de Moya, dando cumplimiento a un mandato del Obispo de Quito y teniendo como testigos al padre Juan Zeñudo, Juan Uribe y Cristóbal de Arévalo.
                        </p>
                        <a href="#">Quiero saber mas</a>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img">
                        <img src="{{ asset('/images/img_history2.jpg') }}" alt="image3" width="550">
                    </div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Creacion</h2>
                        <hr>
                        <p class="lead mb-0">
                            La ciudad de Quillacollo fue creada por el Decreto Supremo 12 de Septiembre de 1905, durante el Gobierno de Ismael Montes fruto de la labor y las gestiones perseverantes del Diputado Doctor Constantino Morales Villazón, sin olvidar su precursor, el ilustre y notable Francisco Anaya.
                        </p>
                        <a href="#">Quiero saber mas</a>
                    </div>
                </div>
            </div>
        </section>
        <hr>

    </div><!--/.container-->
@endsection

