<div class="post-wrapper">
    <div class="post flex-column">
        <div class="header d-inline-flex flex-row mx-0 px-4 align-items-baseline">
            <div class="titulo">
                {{$post->titulo}}
            </div>
            <div class="autor">
                by <span>{{$post->usuario}}</span>
            </div>
        </div>
        <div class="contenido-wrapper">
            <div class="contenido d-flex flex-column px-4 overflow-auto align-items-stretch">
                <div>
                    {{$post->contenido}}
                </div>
            </div>
            <div class="overlay"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="bar row">
            <a href="#" class="save col-1 col1-custom border-end">
                SAVE
            </a>
            <a href="#" class="col text-center border-end">
                Like
            </a>
            <a href="#" class="col text-center border-end">
                Comentar
            </a>
            <a href="#" class="col text-center">
                Reportar
            </a>
        </div>
    </div>
</div>


