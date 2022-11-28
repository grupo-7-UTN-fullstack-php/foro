@extends('../base')
@section('titulo')
    {{$post->titulo}}
@endsection
@push('styles')
    <link rel="stylesheet" href="{{asset('css/post_show.css')}}" type="text/css">
@endpush
@push('scripts')
    <script src="{{asset('js/post_show.js')}}"></script>
@endpush
@section('contenido')
    <div id="main-row" class="row h-100">
        <div class="col-2">

        </div>
        <div id="main-col" class="col">
            <div id="post">
                <div id="titulo">{{$post->titulo}}</div>
                <div id="contenido">{{$post->contenido}}</div>
            </div>
        </div>
        <div class="col-3">

        </div>
    </div>
@endsection
