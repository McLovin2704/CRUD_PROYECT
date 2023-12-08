<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CRUD_PROYECT</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          @guest
          <a class="navbar-brand{{ Request::is('/') ? ' active' : '' }}" href="{{ url('/') }}"><img src="https://daisy.org/wp-content/uploads/2020/05/Google-play-book-icon.png" alt="Logo"></a>
          @else
            @auth
                @if (Auth::user()->hasRole('admin'))
                <a class="navbar-brand{{ Request::is('admin/dashboard') ? ' active' : '' }}" href="{{ route('admin.dashboard') }}"><img src="https://daisy.org/wp-content/uploads/2020/05/Google-play-book-icon.png" alt="Logo"></a>
                @elseif (Auth::user()->hasRole('cliente'))
                <a class="navbar-brand{{ Request::is('client/dashboard') ? ' active' : '' }}" href="{{ route('client.dashboard') }}"><img src="https://daisy.org/wp-content/uploads/2020/05/Google-play-book-icon.png" alt="Logo"></a>
                @endif
            @endauth
           @endguest
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('/') ? ' active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                @else
                    @auth
                        @if (Auth::user()->hasRole('admin'))
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('admin/dashboard') ? ' active' : '' }}" href="{{ route('admin.dashboard') }}">Panel de Admin</a>
                            </li>
                        @elseif (Auth::user()->hasRole('cliente'))
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('client/dashboard') ? ' active' : '' }}" href="{{ route('client.dashboard') }}">Panel de Cliente</a>
                            </li>
                        @endif
                    @endauth
                @endguest
                @auth
                    @if(Auth::user()->hasRole('admin'))
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('admin/create') ? ' active' : '' }}" href="{{ route('admin.createBook') }}">Agregar Libro</a>
                        </li>
                    @endif
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('loans') ? ' active' : '' }}" href="{{ url('/loans') }}">Reservar Libro</a>
                </li>
                @else
                    @auth
                        @if(Auth::user()->hasRole('admin'))
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('loans') ? ' active' : '' }}" href="{{ route('loans.index') }}">Reservar Libro</a>
                        </li>
                        @elseif (Auth::user()->hasRole('cliente'))
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('loans') ? ' active' : '' }}" href="{{ url('/loans') }}">Libros Reservados</a>
                        </li>
                        @endif
                    @endauth
                @endguest
            </ul>
        
            @guest
                <!-- Mostrar elementos para usuarios no autenticados (login y registro) -->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                <a class="navbar-brand" href="{{ route('login') }}">
                    <button type="button" class="btn">Ingresar</button>
                </a>
                <a class="navbar-brand" href="{{ route('register') }}">
                    <button type="button" class="btn">Registrarse</button>
                </a>
            @else
                <!-- Mostrar elemento para usuarios autenticados (logout) -->
                <form action="{{ route('logout') }}" method="post" class="d-flex">
                    @csrf
                    <button type="submit" class="btn">Cerrar Sesión</button>
                </form>
            @endguest
        </div>
        </div>
      </nav>
    <div>
        @yield('content')
    </div>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>