@extends('base')
@section('titulo')
    {{$titulo}}
@endsection

@section('contenido')
    <header>
        <H1>{{$titulo}}</H1>
    </header>
    <div class="container">
        <form class="row g-3" action="{{route('usuarios.update', $usuario->usuario)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6 col-xs-6 col-sm-12">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" class="form-control @error('usuario') is-invalid @enderror"
                       value="{{$usuario->usuario}}"
                       id="usuario" placeholder="Ingrese su nombre de usuario" minlength="2" required name="usuario">
                @error('usuario')
                <div class="alert alert-danger" class="form-label">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">

                <label for="nombre" class="form-label ">Nombre:</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                       value="{{$usuario->nombre}}"
                       id="nombre" placeholder="Ingrese su nombre" name="nombre" minlength="2" required>
                @error('nombre')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                       value="{{$usuario->apellido}}"
                       id="apellido" name="apellido" placeholder="Ingrese su apellido" minlength="2" required>
                @error('apellido')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control  @error('fecha_nacimiento') is-invalid @enderror"
                       value="{{$usuario->fecha_nacimiento}}"
                       id="fecha_nacimiento" name="fecha_nacimiento" required>
                @error('fecha_nacimiento')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{$usuario->email}}"
                       id="email" name="email" placeholder="Ingrese su email" minlength="2" required>
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="col-12 mt-3">
                    <a href="{{route('usuarios.cambiar_pass')}}" class="btn btn-primary">Cambiar Contraseña</a>
                </div>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
                <label for="email_confirmation" class="form-label">Confirmar Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{$usuario->email}}"
                       id="email_confirmation" name="email_confirmation" placeholder="Confirme su email" minlength="2"
                       required>
                @error('email_confirmation')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

            </div>

{{--            <div class="col-md-6 col-xs-6 col-sm-6">--}}
{{--                <label for="password" class="form-label">Cambiar contraseña:</label>--}}
{{--                <input type="password" class="form-control  @error('password') is-invalid @enderror"--}}
{{--                       value="{{old('password')}}"--}}
{{--                       id="password" name="password" placeholder="Ingrese su nueva contraseña" minlength="8" required>--}}
{{--                @error('password')--}}
{{--                <div class="alert alert-danger">{{$message}}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-xs-6 col-sm-6">--}}
{{--                <label for="password_confirmation" class="form-label">Confirmar contraseña nueva:</label>--}}
{{--                <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror"--}}
{{--                       value="{{old('password_confirmation')}}"--}}
{{--                       id="password_confirmation" name="password_confirmation" placeholder="Confirme su contraseña"--}}
{{--                       minlength="8" required>--}}
{{--                @error('password_confirmation')--}}
{{--                <div class="alert alert-danger">{{$message}}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}
            <div>
                <label for="">Cambiar imágen de perfil</label>
                <input type="file" name="imagen" accept="images/*" value="{{$usuario->imagen}}">
            </div>
            {{--            <div class="col-12">--}}
            {{--                <div class="form-check">--}}
            {{--                    <input class="form-check-input" type="checkbox" id="gridCheck" required>--}}
            {{--                    <label class="form-check-label" for="gridCheck">--}}
            {{--                        Acepto los términos y condiciones.--}}
            {{--                    </label>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>

            {{--
                    <label for="usuario">Nombre de Usuario:</label>
                    <input class=" @error('usuario') is-invalid @enderror" value="{{old('usuario')}}" id="usuario" name="usuario"
                           type="text" minlength="2" required><br>
                    @error('usuario')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <label for="nombre" class="form-label">Nombre:</label>
                    <input class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}" id="nombre"
                           name="nombre"
                           type="text" minlength="2" required><br>
                    @error('nombre')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <label for="apellido" class="form-label">Apellido:</label>
                    <input class="@error('apellido') is-invalid @enderror" value="{{old('apellido')}}" id="apellido" name="apellido"
                           type="text" minlength="2" required><br>
                    @error('apellido')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <label for="email" class="form-label">Email:</label>
                    <input class="@error('email') is-invalid @enderror" value="{{old('email')}}" id="email" name="email" type="text"
                           minlength="2" required><br>
                    @error('email')
                    <div class="alert alert-danger" class="form-label">{{$message}}</div>
                    @enderror

                    <label for="email_confirmation" class="form-label">Confirmar Email:</label>
                    <input id="email_confirmation" name="email_confirmation" type="text" minlength="2" required><br>

                    <label for="password" class="form-label">Contraseña:</label>
                    <input class="@error('password') is-invalid @enderror" id="password" name="password" type="password"
                           minlength="8" required><br>
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <label for="password_confirmation">Confirmar contraseña:</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" minlength="8" required><br>

                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    <input class="@error('fecha_nacimiento') is-invalid @enderror" value="{{old('fecha_nacimiento')}}"
                           id="fecha_nacimiento" name="fecha_nacimiento" type="date" required><br>
                    @error('fecha_nacimiento')
                    <div class="alert alert-danger">{{$message}}</div>
                     <button type="submit">Registrarse</button>
                    @enderror --}}
        </form>
    </div>
@endsection

