@once
@push('styles')
    <link rel="stylesheet" href="{{asset('css/components/reaction-bar.css')}}" type="text/css">
@endpush
@prepend('scripts')
    <script src="{{asset('js/comentario.js')}}"></script>
@endprepend
@endonce
<div class="bar-wrapper container-fluid">
    <div class="bar row">
        <a href="#" class="save col-1 col1-custom border-end">
            SAVE
        </a>
        <a href="#" class="col text-center border-end">
            Like
        </a>
        <a
        @if(Auth::check())
            @once
                @push('comentario')
                    <form class="form-comentario row hidden" action="#" method="post">
                        @csrf
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
        class="comentar col text-center border-end">
            Comentar
        </a>
        <a href="#" class="col text-center">
            Reportar
        </a>
    </div>
</div>
@stack('comentario')

