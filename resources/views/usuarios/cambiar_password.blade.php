@extends('base')
@section('titulo')
    Cambiar Contraseña
@endsection

@section('contenido')
    <header>
        <H1>Cambiar Contraseña</H1>
    </header>
    <div class="container">
        <form class="row g-3" action="{{route('usuarios.update_pass')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 col-xs-6 col-sm-6">
                <label for="password_vieja" class="form-label">Actual contraseña:</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror"
                       value="{{old('password_vieja')}}"
                       id="password_vieja" name="password_vieja" placeholder="Ingrese su actual contraseña" minlength="8" required>
                @error('password_vieja')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
                <label for="password" class="form-label">Nueva contraseña:</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror"
                       value="{{old('password')}}"
                       id="password" name="password" placeholder="Ingrese su nueva contraseña" minlength="8" required>
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
                <label for="password_confirmation" class="form-label">Confirmar nueva contraseña:</label>
                <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror"
                       value="{{old('password_confirmation')}}"
                       id="password_confirmation" name="password_confirmation" placeholder="Confirme su nueva contraseña"
                       minlength="8" required>
                @error('password_confirmation')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
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
