@extends('../base')
@section('titulo')
    Crear post
@endsection

@section('contenido')
    <header>
        <H1>{{$titulo}}</H1>
    </header>
    <div class="container">
        <form class="row g-3" action="{{route('post.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo"
                       placeholder="Ingrese el título del post" value="{{old('titulo')}}" required>
                @error('titulo')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="textarea" class="form-label">Cuerpo</label>
                <textarea class="form-control form-control @error('textarea') is-invalid @enderror" name="contenido" id="textarea"
                          rows="5"
                          placeholder="Escribe aqui..." value="{{old('textarea')}}" required></textarea>
                @error('Textarea')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Crear post</button>
            </div>
        </form>
    </div>
    <div class="container">
        <form class="row g-3" action="{{route('comentario.create')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="textareaComentario" class="form-label">Comentario</label>
                <textarea class="form-control form-control @error('textarea') is-invalid @enderror" name="textareaComentario" id="textarea"
                          rows="5"
                          placeholder="Escribe aqui tu comentario..." value="{{old('textarea')}}" required></textarea>
                @error('Textarea')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
@endsection

