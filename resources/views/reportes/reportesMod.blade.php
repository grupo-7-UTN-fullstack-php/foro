@extends('base')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/misReportes.css')}}" type="text/css">
@endpush
@push('scripts')
@endpush
@section('titulo')
    Reportes
@endsection
@section('contenido')
    <div id="main-row" class="row">
        <div class="col-xl-2">
        </div>
        <div id="main-col" class="col text-start overflow-auto">
            @foreach($reportes as $reporte)
                <div class="reporte-wrapper">
                    <div class="card reporte">
                        <div class="card-header reporte-titulo">
                            @php
                                $irA = "";
                            @endphp
                            De {{"@".\App\Models\Usuario::find($reporte->idReportante)->usuario}}
                            contra
                            @if($reporte->idComentario != null)
                                un comentario de
                                @php
                                    $irA = route('post.show',["id" => \App\Models\Comentario::obtenerComentario($reporte->idComentario)->idPost]);
                                @endphp
                            @elseif($reporte->idPost != null)
                                un post de
                                @php
                                    $irA = route('post.show',["id" => $reporte->idPost]);
                                @endphp
                            @endif

                            {{"@".\App\Models\Usuario::find($reporte->idReportado)->usuario}}
                        </div>

                        <div class="card-body">
                            <div class="cuerpo-reporte">
                                <h5 class="card-title">{{\App\Models\Motivo_reporte::motivoDe($reporte->idMotivo)}}</h5>
                                <p class="card-text">{{$reporte->explicacion}}</p>
                            </div>

                            <div class="footer container-fluid d-inline-flex align-items-baseline justify-content-between">
                                <a href="{{$irA}}" class="btn btn-primary">
                                    @if($reporte->idComentario != null)
                                        Ir a Comentario
                                    @elseif($reporte->idPost != null)
                                        Ir a Post
                                    @endif
                                </a>
                                <!-- Default dropup button -->
                                <form class="form-cambio-reporte" method="post" action="{{route('reportes')}}">
                                    @csrf
                                    @method('patch')
                                    <select name="idEstadoReporte" onchange="this.form.submit()" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        @foreach(\App\Models\Estado_reporte::todosLosEstados() as $estado)
                                            <option value="{{$estado->idEstadoReporte}}"
                                                @if($estado->idEstadoReporte == $reporte->idEstadoReporte)
                                                selected
                                                @endif
                                                >
                                                {{$estado->descripcion}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="idReporte" value="{{$reporte->idReporte}}">
                                </form>


                            </div>

                        </div>


                    </div>
                </div>
            @endforeach


        </div>
        <div class="col-xl-2">
        </div>
    </div>
@endsection
