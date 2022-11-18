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
                            <a class="nav-item nav-link" href="{{route('post.index')}}">Mis posts</a>
                            <a class="nav-item nav-link" href="{{route('post.create')}}">Postear</a>
                            <a class="nav-item nav-link" href="{{route('usuarios.index')}}">Usuarios</a>
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
                        <div>
                            <a class="nav-item nav-link" href="{{route('perfil.index')}}">Ver perfil</a>

                        </div>

                        <form class="logout" method="post" action="{{route('login.destroy')}}">
                            @csrf
                            <button type="submit" class="nav-item btn btn-primary">Cerrar Sesión</button>
                        </form>
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
