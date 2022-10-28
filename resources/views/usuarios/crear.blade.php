<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title></title> -->
</head>
<body>
    <div class="formulario">
    <form action="{{route('usuarios.store')}}" method="post">
        @csrf

        <label for="usuario">Nombre de Usuario:</label>
        <input class="@error('usuario') is-invalid @enderror" value = "{{old('usuario')}}" id="usuario" name="usuario" type="text" minlength="2" required><br>
        @error('usuario')
        <div class = "alert alert-danger">{{$message}}</div>
        @enderror

        <label for="nombre">Nombre:</label>
        <input class="@error('nombre') is-invalid @enderror" value = "{{old('nombre')}}" id="nombre" name="nombre" type="text" minlength="2" required><br>
        @error('nombre')
        <div class = "alert alert-danger">{{$message}}</div>
        @enderror

        <label for="apellido">Apellido:</label>
        <input class="@error('apellido') is-invalid @enderror" value = "{{old('apellido')}}" id="apellido" name="apellido" type="text" minlength="2" required><br>
        @error('apellido')
        <div class = "alert alert-danger">{{$message}}</div>
        @enderror

        <label for="email">Email:</label>
        <input class="@error('email') is-invalid @enderror" value = "{{old('email')}}" id="email" name="email" type="text" minlength="2" required><br>
        @error('email')
        <div class = "alert alert-danger">{{$message}}</div>
        @enderror

        <label for="email_confirmation">Confirmar Email:</label>
        <input id="email_confirmation" name="email_confirmation" type="text" minlength="2" required><br>

        <label for="password">Contraseña:</label>
        <input class="@error('password') is-invalid @enderror" id="password" name="password" type="password"  minlength="8" required><br>
        @error('password')
        <div class = "alert alert-danger">{{$message}}</div>
        @enderror

        <label for="password_confirmation">Confirmar contraseña:</label>
        <input id="password_confirmation" name="password_confirmation"  type="password" minlength="8" required><br>

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input class="@error('fecha_nacimiento') is-invalid @enderror" value = "{{old('fecha_nacimiento')}}" id="fecha_nacimiento" name="fecha_nacimiento" type="date" required><br>
        @error('fecha_nacimiento')
        <div class = "alert alert-danger">{{$message}}</div>
        @enderror


        <button type="submit">Registrarse</button>
    </form>
    </div>


</body>
</html>
