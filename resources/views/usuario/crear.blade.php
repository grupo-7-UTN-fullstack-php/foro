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
    {!! Form::open(['action' => 'App\Http\Controllers\UsuarioController@store']) !!}

    {{Form::label('usuario','Nombre de Usuario:')}}
    {{Form::text('usuario')}}
    <br>

    {{Form::label('name','Nombre:')}}
    {{Form::text('nombre')}}
    <br>

    {{Form::label('apellido','Apellido:')}}
    {{Form::text('apellido')}}
    <br>

    {{Form::label('email','Email:')}}
    {{Form::text('email', 'example@gmail.com')}}
    <br>

    {{Form::label('confirmarEmail','Confirmar Email:')}}
    {{Form::text('confirmarEmail')}}
    <br>

    {{Form::label('password','Constraseña:')}}
    {{Form::password('password')}}
    <br>

    {{Form::label('confirmarContraseña','Confirmar Constraseña:')}}
    {{Form::password('confirmarContraseña')}}
    <br>

    {{Form::label('fechaNacimiento','Fecha de Nacimiento:')}}
    {{Form::date('fechaNacimiento',\Carbon\Carbon::now())}}
    <br>

    {{Form::submit('Registrarse')}}
    {!! Form::close() !!}

    </div>
    
    
</body>
</html>