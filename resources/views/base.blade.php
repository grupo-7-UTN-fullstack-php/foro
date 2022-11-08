<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        {{--    <link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">--}}
        @stack('styles')
        @stack('scripts')
        @yield('head')
        <title>@yield('titulo')</title>
    </head>
    <body @yield('body_atrrib')>
        @yield('contenido')
        @stack('scripts')

    </body>
</html>
