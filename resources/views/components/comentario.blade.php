<div post="{{$comentario->idPost}}" id-publicacion="{{$comentario->idComentario}}" class="publicacion comentario-wrapper">
    <div  class="comentable comentario">
        <div class="autor">
            <span><a href="{{route('usuarios.show', ['username' => $comentario->usuario])}}">{{$comentario->usuario}}</a></span>
        </div>
        <div class="contenido">
            {{$comentario->contenido}}
        </div>
    </div>
    <x-reaction-bar id="{{$comentario->idComentario}}" :publicacion="$comentario" :clase="\App\Models\Valoracion_comentario_usuario::class"/>
</div>
