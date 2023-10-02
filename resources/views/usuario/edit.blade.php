<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ Auth::user()->name }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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

    <div class="container" style="padding-top: 30px;">
        <h4>Editar Usuario</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('usuario.update',$usuario->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" required maxlength="50" value="{{$usuario->name}}">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" required value="{{$usuario->apellidos}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" name="email" required value="{{$usuario->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" required value="{{$usuario->password}}">
                    </div>
                    <div class="form-group">
                        <label for="area">Area</label>
                        <input type="text" class="form-control" name="area" required value="{{$usuario->area}}">
                    </div>
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <input type="text" class="form-control" name="rol" required value="{{$usuario->rol}}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <input type="reset" class="btn btn-default" value="Cancelar">
                        <a href="javascript:history.back()">Ir al listado</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </section>
</body>
</html>