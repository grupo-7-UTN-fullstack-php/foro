@extends('../base')
@section('titulo')
    Editar post
@endsection

@section('contenido')
    <header>
        <H1>{{$titulo}}</H1>
    </header>
    <div class="container">
        <form class="row g-3" action="{{route('post.update',$post->idPost)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo"
                       value="{{$post->titulo}}" required>
                @error('titulo')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="textarea" class="form-label">Cuerpo</label>
                <textarea class="form-control form-control @error('textarea') is-invalid @enderror" name="contenido"
                          id="textarea"
                          rows="5"
                          placeholder="" value="{{old('textarea')}}" required>{{$post->contenido}}</textarea>
                @error('textarea')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar post</button>
            </div>
        </form>
    </div>
@endsection


