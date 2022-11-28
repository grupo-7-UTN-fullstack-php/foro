@extends('base')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/home.css')}}" type="text/css">
@endpush
@push('scripts')
    <script src="{{asset('js/home.js')}}"></script>
@endpush
@section('titulo')
    Home
@endsection

@section('contenido')
    <div id="main-row" class="row">
        <div class="col-xl-3">
        </div>
        <div id="main-col" class="col text-center overflow-auto">
            @foreach($posts as $post)
                <x-post :post="$post"></x-post>
            @endforeach
        </div>
        <div class="col-xl-3">
        </div>
    </div>
@endsection
