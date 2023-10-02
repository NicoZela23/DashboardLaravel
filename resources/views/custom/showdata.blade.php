<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Auth::user()->name }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/estilos.css')}}">
</head>
<body class="bg-dark">
<section class="vh-100 gradient-custom2">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark" style="border-bottom: 1px solid grey;">
    <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="navbar-brand" href="{{route('login')}}">
            <img src="{{ URL::to('/') }}/assets/logo.png" alt="Logo" height="50">
            </a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="#">SIS 427</a>
                </li>
        </ul>
        </div>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="{{route('login')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Asignaturas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Calendario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Otros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contacto</a>
                </li>
            
                @auth
                 @if(Auth::user()->rol === 'admin')
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('usuario.index') }}">Usuarios</a>
                </li>
                @endif
                @endauth

                <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </li>
                <li class="nav-item">
                    @auth
                <a class="nav-link text-white" href="{{route('showdata')}}">{{ Auth::user()->name }}</a>
                @else
                <a class="nav-link " href="">>No has iniciado sesión.</a>
                @endauth
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Datos del Usuario</h1>
        <div class="row">
            <div class="col-md-6">
                <h4>Información Personal</h4>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Nombre:</strong> {{ Auth::user()->name }}</li>
                    <li class="list-group-item"><strong>Apellidos:</strong> {{ Auth::user()->apellidos }}</li>
                    <li class="list-group-item"><strong>Correo:</strong> {{ Auth::user()->email }}</li>
                    <li class="list-group-item"><strong>Area:</strong> {{ Auth::user()->area }}</li>
                    <li class="list-group-item"><strong>Rol:</strong> {{ Auth::user()->rol }}</li>
                </ul>
                <button class="btn btn-primary"><a href="{{route('login')}}" style="color: white;">Ir al listado</a></button>
                
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </section>
</body>
</html>