@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9 col-sm-push-3">
                <list-events-component></list-events-component>
            </div><!--/.col-xs-12.col-sm-9-->

            @include('layouts.sidebar')
        </div><!--/row-->

        <hr>

        @include('layouts.footer')

    </div><!--/.container-->
@endsection