@extends('layouts.plantilla')

@section('head')
<title>Eliminar - Cartelera Laravel</title>
@endsection

@section('header')
@endsection

@section('content')
    <div class="container p-4 mb-5">
        <h2 class="h-2 text-danger">Elige una película para borrar</h2>
        <hr class="dropdown-divider text-danger" /><br>
        @if (session()->get('success'))
            <div class='alert alert-success'>
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="table-responsive-sm">
            <table class='table table-hover table-hover'>
                <thead>
                    <tr class='table table-dark'>
                        <td class="font-weight-bold">Título</td>
                        <td class="font-weight-bold">Descripción</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peliculas as $pelicula)
                        <tr>
                            <td>{{ $pelicula->título }}</td>
                            <td>{{ $pelicula->descripción }}</td>
                            <td>
                                <form action="{{ route('peliculas.destroy', $pelicula->id) }}" method='post'>
                                    @csrf
                                    @method('DELETE')
                                    <button class='btn btn-danger btn-floating' type='submit'><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('footer')
@endsection
