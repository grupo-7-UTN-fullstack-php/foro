@once
@push('styles')
    <link rel="stylesheet" href="{{asset('css/components/reaction-bar.css')}}" type="text/css">
@endpush
@prepend('scripts')
    <script src="{{asset('js/reaction-bar.js')}}"></script>
@endprepend

@if(Auth::check())
        <!-- Reportar -->
        <div class="modal fade" id="reporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reportar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form-reporte" action="{{route('comentario.store', $id)}}" method="post">
                        @csrf
                        <div class="modal-body justify-content-start">
                            <label for="reporte-motivo" class="comentario-label">Motivo:</label>
                            <input type="text" class="motivo-reporte form-control"
                                   id="reporte-motivo" name="reporte-motivo" placeholder="Motivo" minlength="10" required></input>
                            <label for="reporte-contenido" class="comentario-label">Explicación:</label>
                            <textarea class="area-reporte form-control"
                                      id="reporte-contenido" name="reporte-contenido" placeholder="¿Por qué consideras necesario este reporte?" minlength="10" required></textarea>
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
                            <script>

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                                    }
                                });

                                function urlValoracionBase(){
                                    return "{{route('valoracion.guardar',["_idValoracion","_publicacion","_idPublicacion"])}}"
                                }

                                function urlValoracion(idValoracion, publicacion, idPublicacion){
                                    return urlValoracionBase()
                                        .replace("_idValoracion",idValoracion)
                                        .replace("_publicacion",publicacion)
                                        .replace("_idPublicacion",idPublicacion);
                                }

                                function actualizarValoracion(elementoJquery, cantidad){
                                    elementoJquery.find('.cantidad').html((cantidad==null || cantidad === undefined) ? 0 : cantidad);
                                }

                                function incrementarValoracion(reactionJQuery){
                                    cantidadActual = parseInt(reactionJQuery.find('.cantidad').html(),10);
                                    reactionJQuery.find('.cantidad').html(cantidadActual+1);
                                }

                                function decrementarValoracion(reactionJQuery){
                                    cantidadActual = parseInt(reactionJQuery.find('.cantidad').html(),10);
                                    reactionJQuery.find('.cantidad').html(cantidadActual-1);
                                }

                                $(".like svg").click(function() {
                                    const id = parseInt($( $(this).closest('.publicacion') ).attr('id-publicacion'), 10);
                                    const publicacion = ($(this).parents('.comentario-wrapper').length == 0) ? 'post' : 'comentario';
                                    const parent = $($(this).parent());
                                    let method;


                                    if($(this).children('.svg-clicked').length != 0){
                                        method = 'DELETE';
                                        decrementarValoracion(parent);
                                    }
                                    else{
                                        method = 'POST';
                                        incrementarValoracion(parent)
                                    }

                                    const idValoracion = 1;
                                    const url = urlValoracion(idValoracion,publicacion,id);

                                    //const mensaje = method + " " + publicacion;

                                    $.ajax({
                                        type: method,
                                        url: url,
                                        data: {idValoracion:idValoracion, publicacion:publicacion, id:id },
                                        success: function (response) {
                                            //console.log("respuesta: "+response);
                                            //alert(mensaje+" cantidad: "+response.toString());

                                        }
                                    });

                                });

                                $(".report-svg > svg").attr('data-bs-toggle',"modal").attr('data-bs-target',"#reporte")

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
                    {!! file_get_contents(asset('svg/bookmark.svg'))!!}
                </a>
            </div>
    </div>
</div>



@stack('comentario')

