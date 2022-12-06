@prepend('styles')
    <link rel="stylesheet" href="{{asset('css/components/post.css')}}" type="text/css">
@endprepend
<div id-publicacion="{{$post->idPost}}" class="publicacion post-wrapper">
    <div class="post flex-column">
        <div class="header d-inline-flex flex-row mx-0 px-4 align-items-baseline">
            <div class="titulo">
                {{$post->titulo}}
            </div>
            <div class="autor">
                by <span><a href="{{route('usuarios.show', ['username' => $post->usuario])}}">{{$post->usuario}}</a></span>
            </div>
        </div>
        <div class="contenido-wrapper">
            <div class="contenido d-flex flex-column px-4 overflow-auto align-items-stretch">
                {{$post->contenido}}
            </div>
            <div class="overlay"></div>
        </div>
    </div>
    <x-reaction-bar id="{{$post->idPost}}"/>

    <div>

    </div>

</div>


