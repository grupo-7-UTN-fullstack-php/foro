@extends('../base')
@section('titulo')
    Iniciar Sesión
@endsection

@section('contenido')
    <header>
        <H1>Iniciar Sesión</H1>
    </header>
    <div class="container">
        <form class="row g-3" action="{{route('login.store')}}" method="post">
            @csrf
            <div class="col-md-6 col-xs-6 col-sm-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"
                       id="email" name="email" placeholder="Ingrese su email" minlength="2" required>
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="col-md-6 col-xs-6 col-sm-6">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror"
                       value="{{old('password')}}"
                       id="password" name="password" placeholder="Ingrese su contraseña" minlength="8" required>
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </div>
        </form>
    </div>
@endsection
