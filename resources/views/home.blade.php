@extends('base')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/home.css')}}" type="text/css">
@endpush

@section('titulo')
    Home
@endsection

@section('contenido')
    <div id="main" class="container-fluid overflow-hidden">
        <div id="main-row" class="row h-100">
            <div class="col">
            </div>
            <div id="main-col" class="col-7 text-center overflow-auto">
                @foreach($posts as $post)
                    <x-post :post="$post"></x-post>
                @endforeach
            </div>
            <div class="col">
            </div>
        </div>
    </div>
@endsection
