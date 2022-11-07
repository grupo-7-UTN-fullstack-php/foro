<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title>Foro</title>
</head>
<body>
<header>
    <H1>Crear usuario</H1>
</header>
<div class="container">
    <form class="row g-3" action="{{route('usuarios.store')}}" method="post">
        @csrf
        <div class="container">
            <div class="col-md-6 col-xs-6 col-sm-6">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" class="form-control" id="usuario" placeholder="ingrese su nombre de usuario">
            </div>
        </div>
        <div class="col-md-6 col-xs-6 col-sm-6">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" placeholder="ingrese su nombre completo">
        </div>
        <div class="col-md-6 col-xs-6 col-sm-6">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" id="apellido" placeholder="ingrese su apellido">
        </div>
        <div class="col-md-6 col-xs-6 col-sm-6">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="ingrese su email">
        </div>
        <div class="col-md-6 col-xs-6 col-sm-6">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
            <input type="date" class="form-control" id="fecha_nacimiento">
        </div>

        <div class="col-md-6 col-xs-6 col-sm-6">
            <label for="inputPassword4" class="form-label">Password:</label>
            <input type="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-6 col-xs-6 col-sm-6">
            <label for="inputPassword5" class="form-label">Confirmar contraseña:</label>
            <input type="password" class="form-control" id="inputPassword5">
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Validar
                </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>


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
        @enderror


        <button type="submit">Registrarse</button>
    </form>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
