@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-right">
            <list-events-component></list-events-component>
        </div><!--/row-->

        <hr>

        @include('layouts.footer')

    </div><!--/.container-->
@endsection