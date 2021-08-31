@extends('layouts.plantilla')

@section('head')
<title>Unauthorized - Cartelera Laravel</title>
@endsection

@section('header')

@endsection


@section('content')
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 p-4">Acceso denegado.</h1>

            <p class="lead">No puedes acceder a esta página. Este contenido solo es accesible para '{{$role}}'</p>

                <div class="container p-3 justify-content-center align-content-center">
                    <a href="{{ url('/inicio') }}" class="btn btn-outline-info btn-lg" role="button"><i class="fas fa-home fa-lg"></i> Volver</a>
                </div>
        </div>
    </div>

@endsection


@section('footer')

@endsection
