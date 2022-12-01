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
    <div id="main-row" class="row">
        <div class="col-xl-2">

        </div>
        <div id="main-col" class="col overflow-auto">
            <x-post :post="$post"></x-post>
            @foreach($comentarios as $comentario)
                <x-comentario :comentario="$comentario"></x-comentario>
            @endforeach
        </div>
        <div class="col-xl-3">

        </div>
    </div>
@endsection
