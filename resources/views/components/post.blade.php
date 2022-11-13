<div id="post-wrapper">
    <div id="post" class="flex-column">
        <div id="header" class="d-inline-flex flex-row mx-0 px-4 align-items-baseline">
            <div id="titulo">
                {{$post->titulo}}
            </div>
            <div id="autor">
                          by {{$post->usuario}}
            </div>
        </div>
        <div id="contenido-wrapper">
            <div id="contenido" class="d-flex flex-column px-4 overflow-auto align-items-stretch">
                <div>
                    {{$post->contenido}}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="bar" class="row">
            <a id="save" href="#" class="col-1 col1-custom border-end">
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


