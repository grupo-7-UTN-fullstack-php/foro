@extends('../base')
@section('titulo')
    Iniciar Sesión
@endsection

@section('contenido')
{{--    <header>--}}
{{--        <H1>Iniciar Sesión</H1>--}}
{{--    </header>--}}
{{--    <div class="container">--}}
{{--        <form class="row g-3" action="{{route('login.store')}}" method="post">--}}
{{--            @csrf--}}
{{--            <div class="col-md-6 col-xs-6 col-sm-6">--}}
{{--                <label for="email" class="form-label">Email:</label>--}}
{{--                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"--}}
{{--                       id="email" name="email" placeholder="Ingrese su email" minlength="2" required>--}}
{{--                @error('email')--}}
{{--                <div class="alert alert-danger">{{$message}}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}

{{--            <div class="col-md-6 col-xs-6 col-sm-6">--}}
{{--                <label for="password" class="form-label">Contraseña:</label>--}}
{{--                <input type="password" class="form-control  @error('password') is-invalid @enderror"--}}
{{--                       value="{{old('password')}}"--}}
{{--                       id="password" name="password" placeholder="Ingrese su contraseña" minlength="8" required>--}}
{{--                @error('password')--}}
{{--                <div class="alert alert-danger">{{$message}}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--            <div class="col-12">--}}
{{--                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}

<!-- Define que el documento esta bajo el estandar de HTML 5 -->


<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">

<head>

    <meta charset="utf-8">

    <title> Formulario de Acceso </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Videojuegos & Desarrollo">
    <meta name="description" content="Muestra de un formulario de acceso en HTML y CSS">
    <meta name="keywords" content="Formulario Acceso, Formulario de LogIn">

    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">

    <!-- Link hacia el archivo de estilos css -->
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

    <style type="text/css">

    </style>

    <script type="text/javascript">

    </script>

</head>

<body>

<div id="contenedor">
    <div id="central">
        <div id="login">
            <div class="titulo">
                Bienvenido
            </div>
            <form id="loginform" action="{{route('login.store')}}" method="post">
                @csrf
                <input type="email" name="email" placeholder="Usuario" required>

                <input type="password" placeholder="Contraseña" name="password" required>

                <button type="submit" title="Ingresar" name="Ingresar">Login</button>
            </form>
            <div class="pie-form">
                <a href="#">¿Perdiste tu contraseña?</a>
                <a href="{{route('usuarios.create')}}">¿No tienes Cuenta? Registrate</a>
            </div>
        </div>
        <div class="inferior">
            <a href="{{route('home')}}">Volver</a>
        </div>
    </div>
</div>

</body>
</html>

@endsection
