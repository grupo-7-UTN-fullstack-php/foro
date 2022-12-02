@once
@push('styles')
    <link rel="stylesheet" href="{{asset('css/components/reaction-bar.css')}}" type="text/css">
@endpush
@prepend('scripts')
    <script src="{{asset('js/reaction-bar.js')}}"></script>
@endprepend
@endonce
<div class="bar-wrapper container-fluid">
    <div class="bar">
        <div class="reactions">
            <div class="like reaction">
                {!! file_get_contents(asset('svg/like.svg'))!!}
            </div>
            <div
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
                    @prepend('scripts')
                        <script src="{{asset('js/comentario.js')}}"></script>
                    @endprepend
                @endonce
            @else
                @push('scripts')
                    <script>
                        $(".reaction svg").click(function() {
                            window.open("{{route('login.create')}}");
                        });
                    </script>
                @endpush

            @endif
            class="comentar reaction text-center">

            {!! file_get_contents(asset('svg/comment.svg'))!!}

            </div>

            <div class="report reaction">
                {!! file_get_contents(asset('svg/report.svg'))!!}
            </div>
        </div>
            <div class="save-wrapper">
                <a href="" class="save reaction">
                    {!! file_get_contents(asset('svg/bookmark.svg'))!!}
                </a>
            </div>
    </div>
</div>
@stack('comentario')

