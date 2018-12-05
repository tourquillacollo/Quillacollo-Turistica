@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9 col-sm-push-3">
                <h1>Lista de Lugares</h1>
                <hr>
                <list-location-component></list-location-component>
            </div><!--/.col-xs-12.col-sm-9-->

            @include('layouts.sidebar')
        </div><!--/row-->

        <hr>

        @include('layouts.footer')

    </div><!--/.container-->
@endsection
