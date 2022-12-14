<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/components/navbar.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/base.css')}}" type="text/css">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    @stack('styles')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    @yield('head')
    <title>@yield('titulo')</title>
</head>
<body @yield('body_atrrib')>
<x-navbar ></x-navbar>
<div class="content">
    <div id="main" class="container-fluid">
         @yield('contenido')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<script>
    let contentHeight = "calc(100% - "+$("#navbar").css("height")+")";
    $(".content").css("height",contentHeight);

    const rutaBase = "{{route('root')}}" ;

</script>
@stack('scripts')
@stack('scripts-after')
</body>
</html>
