@extends('layouts.plantilla')

@section('head')
<title>Comprar - Cartelera Laravel</title>
@endsection

@section('header')

@endsection

@section('content')
    <div class="container p-5 mb-5">
        <h2 class="h-2 text-warning">Comprar entradas</h2>
        <hr class="dropdown-divider text-dark" /><br>
        @if (session()->get('success'))
            <div class='alert alert-success'>
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->get('warning'))
            <div class='alert alert-warning'>
                {{ session()->get('warning') }}
            </div>
        @endif
        <div class="d-flex align-items-center bg-light mb-3">
            <form method="POST" action="{{ route('entradas.store') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="mb-4">
                    <div class="col mb-4">
                        <label for="pelicula_id">Elige una película: </label>
                        <select class="form-select" name="pelicula_id">
                            <option value="" disabled selected>-- Elige la película --</option>
                            @foreach ($peliculas as $pelicula)
                                <option value="{{ $pelicula['id'] }}|{{ $pelicula['título'] }}">
                                    {{ $pelicula['título'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mb-4">
                        <label for="cantidad">¿Cuántas entradas quieres?: </label>
                        <div class="form-outline">
                            <input type="number" name="cantidad" class="form-control" required />
                            <label class="form-label" for="cantidad">Cantidad</label>
                        </div>
                    </div>
                </div>

                <!-- Submit button -->
                <div class="row mb4 justify-content-center align-content-center">
                    <button type="submit" class="btn btn-warning mb-4 col-sm-5">Comprar</button>
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
