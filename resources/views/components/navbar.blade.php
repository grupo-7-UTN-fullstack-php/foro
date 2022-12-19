<nav id="navbar" class="navbar static-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse container-fluid" id="navbarNavAltMarkup">
            <a class="navbar-brand" href="{{route('home')}}">Home</a>
            <div class="container-fluid pe-0">
                <div class="navbar-nav justify-content-evenly">
                    <div class="container">
                        <div class="navbar-nav justify-content-start">
                            <a class="nav-item nav-link" href="{{route('post.create')}}">Postear</a>
                            @can('admin')
                                <a class="nav-item nav-link" href="{{route('usuarios.index')}}">Usuarios</a>
                            @endcan
                            @can('mod')
                                <a class="nav-item nav-link" href="{{route('reportes')}}">Reportes</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="">
                    <div class="navbar-nav justify-content-center">
                        <form class="search-bar" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search"
                                   aria-label="Search">
                        </form>
                    </div>
                </div>
            </div>
            <div class="container pe-0">
                <div class="navbar-nav justify-content-end">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @php
                            $username = \App\Models\Usuario::encontrarUsername(\Illuminate\Support\Facades\Auth::id())->usuario;
                        @endphp
                        <div class="btn-group">
                            <div class="d-inline-flex align-content-center notificacion-svg">
                                {!! file_get_contents(asset('svg/bell.svg'))!!}
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @foreach(\App\Models\Notificacion::obtenerNotificacionesDeUsuario(Auth::id()) as $notificacion)
                                        <li><a class="dropdown-item" href="#">
                                                <x-notificacion :notificacion="$notificacion"/>
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                               aria-expanded="false">{{$username}}  </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item"
                                       href="{{route('usuarios.show',['username'=> $username ] )}}">
                                        Ver perfil</a></li>
                                <li><a class="dropdown-item"
                                       href="{{route('misReportes')}}">
                                        Ver Reportes</a></li>
                                <li><a class="dropdown-item" href="{{route('post.index')}}">Mis posts</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form class="logout" method="post" action="{{route('login.destroy')}}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    @else
                        <a class="nav-item btn btn-primary me-3" href="{{route('login.create')}}">Iniciar
                            Sesión</a>
                        <a class="nav-item btn btn-outline-primary"
                           href="{{route('usuarios.create')}}">Registrarse</a>
                    @endif


                </div>
            </div>
        </div>
    </div>
</nav>
@push('scripts')
    <script src="{{asset('js/navbar.js')}}"></script>
@endpush
