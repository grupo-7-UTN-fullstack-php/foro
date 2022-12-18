@prepend('styles')
    <link rel="stylesheet" href="{{asset('css/components/post.css')}}" type="text/css">
@endprepend
@prepend('scripts')
    {{----}}
    <script src="{{asset('js/post.js')}}"></script>
@endprepend
<div id-publicacion="{{$post->idPost}}" class="publicacion post-wrapper">

    <div class="post flex-column">
        <div class="d-flex align-content-end">

            <div class="header d-inline-flex flex-row mx-0 px-4 align-items-baseline">
                <div class="titulo">
                    {{$post->titulo}}
                </div>
                <div idAutor="{{$post->idUsuario}}" class="autor">
                    by <span><a href="{{route('usuarios.show', ['username' => $post->usuario])}}">{{$post->usuario}}</a></span>
                </div>
                <div>
                </div>
                <div>

                </div>

            </div>
            @if(Auth::check() and Auth::id() == $post->idUsuario)
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn dropdown-toggle edicion align-self-start" data-bs-toggle="dropdown"
                            aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="{{route('post.edit',$post->idPost)}}" class="dropdown-item">
                                Editar
                            </a></li>
                        <li>
                            <form action="{{route('post.destroy', $post->idPost)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item">Eliminar</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
        <div class="contenido-wrapper imagenPost">
            <div class="contenido d-flex flex-column px-4 overflow-auto align-items-stretch">
                {{$post->contenido}}
                <hr>
                <img src="{{asset('storage') .'/'. $post->imagen}}" alt="no se pudo cargar la imágen correctamente.">
            </div>
            <div class="overlay"></div>
        </div>

    </div>
    <x-reaction-bar id="{{$post->idPost}}" :publicacion="$post" :clase="\App\Models\Valoracion_post_usuario::class"/>
    <div>
    </div>
</div>


