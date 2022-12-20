@once
@push('styles')
    <link rel="stylesheet" href="{{asset('css/components/reaction-bar.css')}}" type="text/css">
@endpush

@if(Auth::check())
        <!-- Reportar -->
        <div class="modal fade" id="reporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reportar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form-reporte" action="{{route('reportar')}}" method="post">
                        @csrf
                        <div class="modal-body justify-content-start">
                            <div class="container">

                                <input id="reporte-tipo-publicacion"  type="hidden" name="publicacion" value="">
                                <input id="reporte-id-publicacion" type="hidden" name="idPublicacion" value="">
                                <input id="reporte-usuario-autor" type="hidden" name="idReportado" value="">
                                <h6>Motivo:</h6>
                                <div id="reporte-motivos">
                                    @foreach(\App\Models\Motivo_reporte::obtenerTodosLosMotivos() as $motivo)
                                        <input type="radio" id="{{$motivo->idMotivo}}" name="idMotivo" value="{{$motivo->idMotivo}}">
                                        <label for="{{$motivo->idMotivo}}">{{$motivo->motivo}}</label><br>

                                    @endforeach
                                </div>
                                <h6> <label for="reporte-contenido" class="comentario-label">Explicación:</label></h6>
                                <textarea class="area-reporte form-control"
                                          id="reporte-contenido" name="explicacion" placeholder="¿Por qué consideras necesario este reporte?" minlength="10" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Reportar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endif

@endonce
<div class="bar-wrapper container-fluid">
    <div class="bar">
        <div class="reactions">
            <div class="like reaction">


                @if(Auth::check() && $clase::obtenerQuery(1,Auth::id(),$id)->exists())
                    {!! str_replace("<path",'<path class="svg-clicked"',
                        str_replace("<svg",'<svg class="svg-clicked"',
                        str_replace("<style",'<style class="svg-clicked"',
                        file_get_contents(asset('svg/like.svg')))))!!}
                @else
                    {!!file_get_contents(asset('svg/like.svg'))!!}
                @endif
                <div class="cantidad">{{(isset($publicacion->valoraciones["1"])) ? $publicacion->valoraciones["1"] : 0  }}</div>
            </div>
            <div
            @if(Auth::check())

                @once
                    @push('comentario')
                        <form class="form-comentario row hidden" action="{{route('comentario.store', $id)}}" method="post">
                            @csrf
                            <input type="hidden" id="idPost" name="idPost" value="{{$id}}">
                            <label for="comentario" class="comentario-label"></label>
                            <textarea class="area-comentario form-control"
                                      id="comentario" name="contenido" placeholder="Comentario" minlength="10" required></textarea>
                            <button type="submit" class="comentario-submit btn btn-primary">Comentar</button>
                        </form>
                    @endpush
                    @prepend('scripts')
                            <script src="{{asset('js/reaction-bar.js')}}"></script>
                            <script>

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                                    }
                                });

                                function urlValoracionBase(){
                                    return "{{route('valoracion.guardar',["_idValoracion","_publicacion","_idPublicacion"])}}"
                                }

                            </script>
                            <script src="{{asset('js/comentario.js')}}"></script>
                    @endprepend


                @endonce
            @else
                @push('scripts')
                    <script>
                        $(".reaction svg").click(function() {
                            window.location = "{{route('login.create')}}";
                        });
                    </script>
                @endpush

            @endif
            class="comentar reaction text-center">

            {!! file_get_contents(asset('svg/comment.svg'))!!}

            <div class="cantidad">{{(isset($publicacion->cant_comentarios)) ? $publicacion->cant_comentarios : 0 }}</div>

            </div>

            <div class="report-svg reaction">
                {!! file_get_contents(asset('svg/report.svg'))!!}
                <!-- Button trigger modal -->



            </div>
        </div>
            <div class="save-wrapper">
                <a href="" class="save reaction">
                   {{-- {!! file_get_contents(asset('svg/bookmark.svg'))!!}--}}
                </a>
            </div>
    </div>
</div>



@stack('comentario')

