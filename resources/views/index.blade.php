<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">
{{--    <link rel="stylesheet" href="{{asset('css/index.css')}}">--}}
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<table  class="tabla align-self-center">
    <thead>
        <tr>
            @foreach($campos as $campo)
            <th scope = "col">{{$campo}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($elementos as $elemento)
            <tr>
            @foreach($campos as $campo)
                <td>@php echo $elemento->{$campo} @endphp</td>
            @endforeach
        @endforeach
            </tr>
    </tbody>
</table>

</div>

</body>

</html>

