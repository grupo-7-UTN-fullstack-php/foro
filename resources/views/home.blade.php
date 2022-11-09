@extends('base')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/home.css')}}" type="text/css">
@endpush

@section('titulo')
    Home
@endsection

@section('contenido')
    <div class="container">
{{--        <nav class="navbar navbar-expand-lg bg-light">--}}
{{--            <div class="container-fluid">--}}
{{--                <a class="navbar-brand" href="#">Navbar</a>--}}
{{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"--}}
{{--                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"--}}
{{--                        aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}
{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">Link</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" href="{{route('usuarios.create')}}" role="button" data-bs-toggle="dropdown"--}}
{{--                               aria-expanded="false">--}}
{{--                                Login--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" href="{{route('login.create')}}">Iniciar sesión</a></li>--}}
{{--                                <li><a class="dropdown-item" href="{{route('usuarios.create')}}">Registrarse</a></li>--}}
{{--                                <li>--}}
{{--                                    <hr class="dropdown-divider">--}}
{{--                                </li>--}}
{{--                                <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link disabled">Disabled</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <form class="d-flex" role="search">--}}
{{--                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                        <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}


                <div class="row justify-content-center">
                    <div class="col self-align-center text-center">
                        <form action="{{route('login.destroy')}}" method="post">
                            @csrf
                            <a  type="button" href="{{route('usuarios.create')}}" class="btn btn-primary">Registrarse</a>
                            <a  type="button" href="{{route('login.create')}}" class="btn btn-primary">Iniciar Sesión</a>
                            <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
                            <a  type="button" href="{{route('usuarios.usuarios')}}" class="btn btn-primary">Usuarios</a>
                            <a  type="button" href="{{route('post.create')}}" class="btn btn-primary">Postear</a>
                        </form>
    </div>

    {{----}}
    </div>
    </div>
@endsection
