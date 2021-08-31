@extends('layouts.plantilla')

@section('head')
<title>Añadir - Cartelera Laravel</title>
@endsection

@section('header')

@endsection

@section('content')
    <div class="container p-5 mb-5">
        <h2 class="h-2 text-warning">Añadir peliculas</h2>
        <hr class="dropdown-divider text-dark" /><br>
        @if (session()->get('success'))
                <div class='alert alert-success'>
                    {{ session()->get('success') }}
                </div>
            @endif
        <div class="d-flex align-items-center bg-light mb-3">
            <form method="POST" action="{{ route('peliculas.store') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="mb-4">
                    <div class="col mb-4">
                        <label for="titulo">Introduce el título: </label>
                        <div class="form-outline">
                            <input type="text" name="título" class="form-control" required />
                            <label class="form-label" for="titulo">Título</label>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <label for="descripción">Introduce la descripción: </label>
                        <div class="form-outline">
                            <input type="text" name="descripción" class="form-control" required />
                            <label class="form-label" for="descripción">Descripción</label>
                        </div>
                    </div>
                    <div class="col">
                        <label for="entradas_disp">Introduce las entradas disponibles: </label>
                        <div class="form-outline">
                            <input type="number" name="entradas_disp" class="form-control" required />
                            <label class="form-label" for="entradas_disp">Entradas disponibles</label>
                        </div>
                    </div>
                </div>

                <!-- Submit button -->
                <div class="row mb4 justify-content-center align-content-center">
                    <button type="submit" class="btn btn-warning mb-4 col-sm-5">Añadir</button>
                </div>
            </form>
            @if ($errors->any())
                <div class='alert alert-danger'>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
        </div>
    </div>
@endsection


@section('footer')

@endsection
