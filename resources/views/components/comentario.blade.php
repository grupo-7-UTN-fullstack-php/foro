<div post="{{$comentario->idPost}}" id-publicacion="{{$comentario->idComentario}}" class="publicacion comentario-wrapper">
    <div  class="comentable comentario">
        <div class="autor">
            {{$comentario->usuario}}
        </div>
        <div class="contenido">
            {{$comentario->contenido}}
        </div>
    </div>
    <x-reaction-bar id="{{$comentario->idComentario}}"/>
</div>
