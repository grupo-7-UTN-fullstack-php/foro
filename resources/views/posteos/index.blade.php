@extends('../base')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/index.css')}}" type="text/css">
@endpush
@push('scripts')
    <script src="{{asset('public/js/index.js')}}"></script>
@endpush
@section('titulo')
   Ver post
@endsection

@section('contenido')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table tabla table-sm w-auto table-striped table-bordered">
                <thead>
                <tr>
                    @foreach($campos as $campo)
                        <th scope="col" class="fs-sm text-center text-capitalize text-wrap">{{$campo}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($elementos as $elemento)
                    <tr>
                        @foreach($campos as $campo)
                            <td class="fs-sm text-center text-wrap">@php echo $elemento->{$campo} @endphp</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
