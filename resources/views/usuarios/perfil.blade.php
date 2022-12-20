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
        <div id="main-col" class="col overflow-auto">
            <div class="perfil-wrapper">
                <div class="perfil">
                    <div id="header container-fluid">
                        <h2 class="username">{{$usuario->usuario}}</h2>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{route('usuarios.edit', $usuario->usuario)}}">Editar
                            perfil</a>
                        {{--                    </div>--}}
                        {{--                    <div>--}}
                        {{--                        <form action="{{route('usuarios.destroy', $usuario->usuario)}}" method="post">--}}
                        {{--                            @csrf--}}
                        {{--                            @method('DELETE')--}}
                        {{--                            <button class="dropdown-item link-primary" data-bs-target="#myModal">Dar de baja éste usuario</button>--}}
                        {{--                        </form>--}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            Dar de baja
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Está a punto de eliminar el
                                            usuario</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Está seguro que lo quiere eliminar?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar
                                        </button>
                                        <form action="{{route('usuarios.destroy', $usuario->usuario)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">
                                                Eliminar usuario
                                            </button>
                                        </form>
                                        {{--<button type="button" class="btn btn-primary">Eliminar usuario</button>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

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
                            <div>{{$usuario->descripcionRol}}</div>
                        </div>
                        <div class="container-fluid">
                            <h4>Estado:</h4>
                            <div>{{$usuario->descripcionEstado}}</div>
                        </div>
                        {{--                        <div class="container-fluid">--}}
                        {{--                            <h4>Activo:</h4>--}}
                        {{--                            <div>{{$usuario->activo}}</div>--}}
                        {{--                        </div>--}}
                        <div class="container-fluid">
                            <h4>Se unió en:</h4>
                            <div>{{$usuario->created_at}}</div>
                        </div>
                        <hr>
                        <div class="d-flex flex-column px-4 overflow-auto align-items-stretch imagenPerfil">
                            <img src="{{asset('storage').'/' . $usuario->imagen}}"
                                 alt="no se pudo cargar la imágen correctamente.">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>

@endsection

