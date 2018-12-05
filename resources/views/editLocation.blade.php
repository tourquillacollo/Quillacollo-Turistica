@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9 col-sm-push-3">
                <h1><i class="fa fa-map-marker"></i></i> Nuevo Lugar</h1>
                <hr>
                <edit-location-component></edit-location-component>
            </div><!--/.col-xs-12.col-sm-9-->

            @include('layouts.sidebar')
        </div><!--/row-->

        <hr>

        @include('layouts.footer')

    </div><!--/.container-->
@endsection