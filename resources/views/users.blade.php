@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <list-users-component></list-users-component>

        @include('layouts.footer')

    </div><!--/.container-->
@endsection