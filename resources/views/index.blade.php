@extends('base')
@section('titulo')
    Index
@endsection

@section('contenido')
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
@endsection

