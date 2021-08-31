<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('head')
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />   
  
</head>


<body>
    <div class="cabecera">
        @yield('header')
        <!-- Aquí vendrá una sección de cabecera, que la personalizaremos más tarde -->
        <header>
            <!-- Background image -->
            <div class="p-4 text-center bg-image" style="
                background-image: url('https://www.de-paseo.com/queretaro/wp-content/uploads/2015/06/qro_ent_cine_head.jpg');
                height: 190px;
              ">
                <div>
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white">
                            <h1 class="mb-3 font-weight-light">Cartelera Laravel</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Background image -->
        </header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse justifi" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/inicio') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/peliculas') }}">Cartelera</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/peliculas/create') }}">Añadir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/peliculas/borrar') }}">Eliminar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/comprar-entradas') }}">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/aforo') }}">Aforo</a>
                        </li>

                        @if (Route::has('login'))
                        @auth
                        <li>
                          <a class='nav-link disabled' href='#'>{{ Auth::user()->name }}</a></li>
                          <li><form method='post' class='d-flex' action="{{ route('logout') }}">
                            @csrf
                            <button class='btn btn-outline-success' type='submit'>Cerrar sesión</button>
                          </form></li>          
                        @else
                          <a class='nav-link' href="{{ route('login') }}">Iniciar sesión</a>
                          @if (Route::has('register'))
                            <a class='nav-link' href="{{ route('register') }}">Crear cuenta</a>
                          @endif
                        @endauth
                      @endif
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    <div class="contenido" style="height: auto">
        @yield('content')
        <!-- Aquí vendrá una sección de información general, que la personalizaremos más tarde -->
    </div>
    <div class="pie">
        @yield('footer')
        <footer class="text-center text-white fixed-bottom" style="background-color: #21081a;">
            <!-- Grid container -->
            <div class="container p-2"></div>
            <!-- Grid container -->
          
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2020 Copyright:
              <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
          </footer>
    </div>
    

   
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
 

</body>

</html>
