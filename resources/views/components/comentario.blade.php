<div id="{{$comentario->idPost}}.{{$comentario->idComentario}}" class="comentario-wrapper">
    <div  class="comentable comentario">
        <div class="autor">
            {{$comentario->usuario}}
        </div>
        <div class="contenido">
            {{$comentario->contenido}}
        </div>
    </div>
    <x-reaction-bar></x-reaction-bar>
</div>
