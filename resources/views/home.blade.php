@extends('base')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/home.css')}}" type="text/css">
@endpush

@section('titulo')
    Home
@endsection

@section('contenido')
   <div id="main" class="container-fluid">
       <div  id="main-row" class="row h-100">
           <div class="col">

           </div>
           <div class="col-6 text-center">
                Aca van los posts
           </div>
           <div class="col">

           </div>
       </div>

   </div>
@endsection
