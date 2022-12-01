@once
@push('styles')
    <link rel="stylesheet" href="{{asset('css/components/reaction-bar.css')}}" type="text/css">
@endpush
@prepend('scripts')
    <script src="{{asset('js/comentario.js')}}"></script>
@endprepend
@endonce
<div class="bar-wrapper container-fluid">
    <div class="bar">

        <div class="reactions">
            <div class="like reaction">
                <img src="{{asset('svg/like.svg')}}" alt="">
            </div>
            <a
            @if(Auth::check())
                @once
                    @push('comentario')
                        <form class="form-comentario row hidden" action="{{route('comentario.store', $idPost)}}" method="post">
                            @csrf
                            <input type="hidden" id="idPost" name="idPost" value="{{$idPost}}">
                            <label for="comentario" class="comentario-label"></label>
                            <textarea class="area-comentario form-control"
                                      id="comentario" name="contenido" placeholder="Comentario" minlength="10" required></textarea>
                            <button type="submit" class="comentario-submit btn btn-primary">Comentar</button>
                        </form>
                    @endpush
                @endonce
            @else
                href="{{route('login.create')}}"
            @endif
            class="comentar reaction text-center">
            <img src="{{asset('svg/comment.svg')}}" alt="">
            </a>


            <div class="report reaction">
                <img src="{{asset('svg/report.svg')}}" alt="">
            </div>
        </div>
        <div class="save-wrapper">
            <a href="" class="save reaction">
                <img src="{{asset('svg/bookmark.svg')}}" alt="">
            </a>
        </div>
    </div>
</div>
@stack('comentario')

