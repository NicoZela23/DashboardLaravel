@auth
@if(Auth::user()->rol === 'admin' || Auth::user()->rol === 'estudiante')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/estilos.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
        <h4>Gestion de Usuarios</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('usuario.index')}}" method="get">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" value="Buscar" class="btn btn-primary">
                        </div>
                        <div class="col-auto my-1">
                            <a href="{{route('usuario.create')}}" class="btn btn-success">Nuevo</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Area</th> 
                                <th>Rol</th> 
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($usuarios)<=0)
                        <tr>
                            <td colspan="9">No hay resultados</td>
                        </tr>
                        @else
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>
                                    <a href="{{route('usuario.edit', $usuario->id)}}" class="btn btn-warning btn-sm">Editar</a> 
                                    <form action="{{route('usuario.destroy', $usuario->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                                </form>
                                </td>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->apellidos}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->area}}</td>
                                <td>{{$usuario->rol}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button class="btn btn-primary"><a href="{{route('login')}}" style="color: white;text-decoration: none;">Ir al listado</a></button>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </section>
</body>
</html>
@else
<a class="nav-link " href="">>No has iniciado sesión.</a>
@endif
@endauth