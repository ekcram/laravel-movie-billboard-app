@extends('layouts.plantilla')

@section('head')
<title>Aforo - Cartelera Laravel</title>
@endsection

@section('header')

@endsection

@section('content')
    <div class="container p-3 mb-5">
        <h2 class="h-2 text-success">Aforo</h2>
        <hr class="dropdown-divider text-dark" /><br>
        <div class='table-responsive-sm'>
            <table class='table table-stripped table-hover'>
                <thead>
                    <tr class='table table-dark'>
                        <td class="font-weight-bold">Película</td>
                        <td class="font-weight-bold">Sipnosis</td>
                        <td class="font-weight-bold">Entradas disponibles</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $dato)
                        <tr>
                            <td>{{ $dato->título }}</td>
                            <td>{{ $dato->descripción }}</td>
                            <td>{{ $dato->entradas_disp }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class='table-responsive-sm'>
            <table class='table table-stripped table-hover'>
                <thead>
                    <tr class='table table-dark'>
                        <td class="font-weight-bold">Película</td>
                        <td class="font-weight-bold">Nº de entradas compradas</td>
                        <td class="font-weight-bold">Usuario</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos1 as $dato1)
                        <tr>
                            <td>{{ $dato1->pelicula_título }}</td>
                            <td>{{ $dato1->cantidad }}</td>
                            <td>{{ $dato1->user_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
            </div>
        </div>
    </div>
@endsection


@section('footer')

@endsection
