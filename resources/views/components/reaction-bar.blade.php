@once
@push('styles')
    <link rel="stylesheet" href="{{asset('css/components/reaction-bar.css')}}" type="text/css">
@endpush
@prepend('scripts')
    <script src="{{asset('js/reaction-bar.js')}}"></script>
@endprepend
@endonce
<div class="bar-wrapper container-fluid">
    <div class="bar">
        <div class="reactions">
            <div class="like reaction">
                {!! file_get_contents(asset('svg/like.svg'))!!}
                <div class="cantidad"></div>
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

                                function ajaxRequest(method,url,data,mensaje){

                                    $.ajax({
                                        type: method,
                                        url: url,
                                        data: data,
                                        success: function (response) {
                                            //alert(mensaje+" cantidad: "+response.toString());
                                            actualizarRespuesta(response);
                                        }
                                    });

                                }

                                function xd(elementos, cantidad){

                                    for(const e of elementos){
                                        actualizarValoracion($(e),cantidad);
                                    }
                                }

                                function actualizarValoracion(elementoJquery, cantidad){
                                    elementoJquery.find('.cantidad').html((cantidad==null || cantidad === undefined) ? 0 : cantidad);
                                }

                                function actualizarValoraciones(elementos){
                                    for(const e of elementos){
                                        const id = parseInt($( $(e).closest('.publicacion') ).attr('id-publicacion'), 10);
                                        const publicacion = ($(e).parents('.comentario-wrapper').length == 0) ? 'post' : 'comentario';
                                        const idValoracion = 1;
                                        $.ajax({
                                            type: 'GET',
                                            url: urlValoracion(idValoracion,publicacion,id),
                                            data: {idValoracion:idValoracion, publicacion:publicacion, id:id },
                                            success: function (response) {
                                                //console.log("respuesta: "+response);
                                                //alert(mensaje+" cantidad: "+response.toString());
                                                actualizarValoracion($(e),response);

                                            }
                                        });



                                    }
                                }



                                $(".like svg").click(function() {
                                    const id = parseInt($( $(this).closest('.publicacion') ).attr('id-publicacion'), 10);
                                    const publicacion = ($(this).parents('.comentario-wrapper').length == 0) ? 'post' : 'comentario';
                                    const method = ($(this).children('.svg-clicked').length != 0) ? 'DELETE' : 'POST';
                                    const idValoracion = 1;
                                    const url = urlValoracion(idValoracion,publicacion,id);

                                    const parent = $($(this).parent());

                                    //const mensaje = method + " " + publicacion;

                                    $.ajax({
                                        type: method,
                                        url: url,
                                        data: {idValoracion:idValoracion, publicacion:publicacion, id:id },
                                        success: function (response) {
                                            //console.log("respuesta: "+response);
                                            //alert(mensaje+" cantidad: "+response.toString());
                                            actualizarValoracion(parent,response);

                                        }
                                    });

                                });

                                window.onload = function(){
                                    actualizarValoraciones($('.like'));
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

            </div>

            <div class="report reaction">
                {!! file_get_contents(asset('svg/report.svg'))!!}
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

