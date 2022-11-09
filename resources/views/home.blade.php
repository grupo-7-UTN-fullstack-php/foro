@extends('base')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/home.css')}}" type="text/css">
@endpush

@section('titulo')
    Home
@endsection

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col self-align-center text-center">
                <form action="{{route('login.destroy')}}" method="post">
                    @csrf
                    <a  type="button" href="{{route('usuarios.create')}}" class="btn btn-primary">Registrarse</a>
                    <a  type="button" href="{{route('login.create')}}" class="btn btn-primary">Iniciar Sesion</a>
                    <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
                    <a  type="button" href="{{route('usuarios.usuarios')}}" class="btn btn-primary">Usuarios</a>
                    <a  type="button" class="btn btn-primary">Postear</a>
                </form>
            </div>

            {{----}}
        </div>
    </div>
@endsection
