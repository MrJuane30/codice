<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="{{ Auth::user() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/2760dbc43b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/notify.css') }}" rel="stylesheet">
    @yield('scripts')
    @yield('scripts3')


</head>

<body>
    <div id="app">
        <div class="d-flex sidebarToggle" id="wrapper">
            <!-- Sidebar-->
            <div class="bg-dark" id="sidebar-wrapper">
                <div class="sidebar-heading bg-dark">
                    <a class="navbar-brand text-light" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                </div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-light" href="{{route('home')}}">Dashboard <i class="fas fa-chart-line"></i></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-light" href="{{route('usuarios.index')}}">Usuarios <i class="fas fa-users"></i> </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-light" href="{{route('eventos')}}">Calendario <i class="fas fa-calendar-week"></i></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-light" href="{{route('acontecimientos.index')}}">Eventos <i class="fas fa-calendar-day"></i></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-light" href="{{route('publicacion.index')}}">Publicaciones <i class="fas fa-pencil-alt"></i></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-light" href="{{route('comentarios.index')}}">Comentarios <i class="far fa-comments"></i></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-light" href="{{route('amigos.index')}}">Amigos <i class="fas fa-user-friends"></i></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-light" href="{{route('repositorio.index')}}">Repositorios <i class="fas fa-book"></i></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-light" href="{{route('colectivo.index')}}">Colectivos <i class="fas fa-people-carry"></i></a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Ocultar menú <i class="fas fa-window-close"></i></button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        @php
                        $notificaciones= App\Models\Notificacion::where('estado',1)->get();
                        $cantidad= sizeof($notificaciones);
                        @endphp
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="badge badge-danger ml-2">{{$cantidad}}</span>
                                        <i class="fas fa-bell"></i>
                                        <span class="sr-only">(current)</span></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            @foreach ($notificaciones as $notificacion)
                                            <div class="dropdown-item notifications-item"> 
                                            @php
                                             $user= App\Models\User::findOrFail($notificacion->user_id);  
                                             $imagen= $user->perfil->image;
                                            @endphp
                                            <img src="/storage/{{$imagen}}" alt="img">
                                            <div class="text">
                                                <h4>{{$notificacion->titulo}}</h4>
                                                <p>{{$notificacion->descripcion}}</p>
                                                <form method="post" action="{{route('notificacion.update', ['notificacion' => $notificacion->id])}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-dark offset-md-4">Ir</button>
                                                </form>                                           
                                             </div>
                                            </div>
                                            @endforeach
                                      </div>
                                </li>
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                       @if (!Auth::user()->perfil->image)
                                       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" width="40" height="40" class="rounded-circle">
                                        {{ Auth::user()->name }}
                                       @else
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="/storage/{{Auth::user()->perfil->image}}" width="40" height="40" class="rounded-circle">
                                            {{ Auth::user()->name }}

                                          </a>
                                          @endif
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{route('Profile.index')}}">
                                                {{ __('Perfil ') }} <i class="fas fa-id-badge"></i>
                                            </a>
                                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout ') }} <i class="fas fa-sign-out-alt"></i>
                                            </a>
                                              
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <main class="my-5">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
    @yield('scripts2')

</body>
<script>
    window.addEventListener('DOMContentLoaded', event => {

// Toggle the side navigation
const sidebarToggle = document.body.querySelector('#sidebarToggle');
if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener('click', event => {
        event.preventDefault();
        document.body.classList.toggle('sb-sidenav-toggled');
        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    });
}

});

</script>


</html>
