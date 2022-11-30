@extends('../base')
@section('titulo')
    {{$usuario->usuario}}
@endsection

@prepend('styles')
    <link rel="stylesheet" href="{{asset('css/perfil.css')}}" type="text/css">
@endprepend

@section('contenido')
    <div id="main-row" class="row">
        <div class="col-3"></div>
        <div id="main-col" class="col">
            <div class="perfil-wrapper">
                <div class="perfil">
                    <div id="header container-fluid">
                        <h2 class="username">{{$usuario->usuario}}</h2>
                    </div>
                    <hr>
                    <div id="content">
                        <div class="container-fluid">
                            <h4 class="">Nombre:</h4>
                            <div>{{$usuario->nombre}} {{$usuario->apellido}}</div>
                        </div>
                        <div class="container-fluid">
                            <h4>Email:</h4>
                            <div>{{$usuario->email}}</div>
                        </div>
                        <div class="container-fluid">
                            <h4>Fecha de Nacimiento:</h4>
                            <div>{{$usuario->fecha_nacimiento}}</div>
                        </div>
                        <div class="container-fluid">
                            <h4>Rol:</h4>
                            <div>{{$usuario->idRol}}</div>
                        </div>
                        <div class="container-fluid">
                            <h4>Estado:</h4>
                            <div>{{$usuario->idEstado}}</div>
                        </div>
                        <div class="container-fluid">
                            <h4>Activo:</h4>
                            <div>{{$usuario->activo}}</div>
                        </div>
                        <div class="container-fluid">
                            <h4>Se unió en:</h4>
                            <div>{{$usuario->created_at}}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection
