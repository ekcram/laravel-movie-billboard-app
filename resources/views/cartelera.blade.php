@extends('layouts.plantilla')

@section('head')
<title>Cartelera - Cartelera Laravel</title>
@endsection

@section('header')

@endsection

@section('content')
    <div class="container p-5 mb-5">
        <div class="row w-70">
            <h2 class="h-2 text-success">Echa un vistazo a las películas disponibles en nuestra web</h2>
            <hr class="dropdown-divider text-dark" /><br>
            <div class='table-responsive-sm'>
                <table class='table table-stripped table-hover'>
                    <thead>
                        <tr class='table table-dark'>
                            <td class="font-weight-bold">ID</td>
                            <td class="font-weight-bold">Título</td>
                            <td class="font-weight-bold">Descripción</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peliculas as $pelicula)
                            <tr>
                                <td>{{ $pelicula->id }}</td>
                                <td>{{ $pelicula->título }}</td>
                                <td>{{ $pelicula->descripción }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection


    @section('footer')

    @endsection
