@extends('layouts.site')

@section('content')
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
    <div class="container-fluid">
        <br><br>

        <!-- Image Showcases -->
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row no-gutters">

                    <div class="col-lg-6 order-lg-2 text-white showcase-img">
                        <img src="{{ asset('/images/quilla_1.jpg') }}" alt="image3" width="550">
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
                        <img src="{{ asset('/images/quilla_1.jpg') }}" alt="image3" width="550">
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
        <!-- Testimonials -->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">Que es lo que la gente dice</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
                            <h5>Margaret E.</h5>
                            <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
                            <h5>Fred S.</h5>
                            <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
                            <h5>Sarah	W.</h5>
                            <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Portfolio Section -->
        {{--<h3>PROVINCIA DE QUILLACOLLO</h3>--}}
        {{--<hr>--}}
        {{--<div class="row">--}}
            {{--<h4>1. HISTORIA DE QUILLACOLLO</h4>--}}
            {{--<div class="row">--}}
                {{--<div class="col">--}}
                    {{--El Origen de Quillacollo se remonta a mucho antes del 14 de septiembre de 1905, fecha en la que durante la presidencia de Ismael Montes se promulgó una ley por la que entonces la provincia  Tapacarí se divide en dos, dando origen a Quillacollo con su capital del mismo nombre y conformada por dos secciones. <br>--}}
                    {{--Los datos de la existencia de Quillacollo se pierden en la prehistoria de los pueblos y civilizaciones aymaras y quechuas (1245) que poblaron estas tierras en las partes altas.<br>--}}
                    {{--Veintidós años después de la fundación  de la Villa de Oropeza (1571, hoy ciudad de Cochabamba), el 14 de septiembre en 1953 fue fundado Quillacollo por Joan de Solíz y Francisco de Moya en cumplimiento del mandato del Obispo de Quito y teniendo como testigos al padre Joan Zeñudo, Joan de Uribe, Cristóbal de Arébalo, Francisco de la Moya y Joan de Solíz, según consta en un documento del Archivo Histórico Municipal de Cochabamba.<br>--}}
                    {{--En 1962, la parroquia de San Ildefonso es reconocida como Vicaría Foránea.<br>--}}
                    {{--En el Decreto de 9 de febrero de 1825, promulgada por el Mariscal Antonio José de Sucre, en el que se declara a las provincias del Alto Perú independientes se menciona a Quillacollo como uno de los siete cantones del departamento de Cochabamba.<br>--}}
                    {{--En 1848 por Ley del 22 de agosto, Quillacollo es declarado capital de la provincia de Tapacarí.<br>--}}
                {{--</div>--}}
                {{--<div class="col">--}}
                    {{--<img src="{{ asset('/images/quilla_1.jpg') }}" alt="image3">--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
                {{--En 1848 por Ley del 22 de agosto, Quillacollo es declarado capital de la provincia de Tapacarí.--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--En 1990 se realizó un censo y Quillacollo tenía 3.885 habitantes, por lo que a iniciativa del diputado por la provincia de Tapacarí, doctor Isidoro Caballero, durante el Gobierno de José Manuel Pando, se promulga la Ley del 14 de noviembre, por el que “se eleva el pueblo de Quillacollo al rango de ciudad”.--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--Cinco años más tarde, en 1905 por impulso de Francisco Anaya y el diputado Constantino Morales, que alentaron la idea autonomista ante el crecimiento de la región, se crea la provincia de Quillacollo, consolidándose su autonomía administrativa, política y geográfica.--}}
            {{--</div>--}}
        {{--</div>--}}
    </div><!--/.container-->
@endsection

