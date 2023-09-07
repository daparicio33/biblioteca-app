<div class="tm-main-content">                    
    <section class="row tm-item-preview tm-margin-b-xl">
        <div class="col-12">
            <h2 class="tm-blue-text tm-margin-b-p text-center">Catálogo de Libros por Programa de Estudios</h2>
        </div>
    </section>
    <div class="row tm-margin-b-ll">
        @foreach ($programas as $programa)
            <article class="col-12 col-sm-12 col-md-4 col-lg-4 mb-md-0 mb-5">
                <p class="mb-2">
                    {{-- <a href="{{ route('show_book_programas',$programa->idCarrera) }}"class="btn btn-info">
                        <i class="fa fa-eye" aria-hidden="true"></i> ver
                    </a> --}}
                </p>
                <div class="text-center tm-margin-b-30"><i class="fa tm-fa-6x {{ $programa->icon }} tm-blue-text"></i></div>
                <header class="tm-margin-b-30">
                    <h5 class="tm-blue-text tm-h5 text-center">
                        <a href="{{ route('show_book_programas',$programa->idCarrera) }}">{{ $programa->nombreCarrera }}</a>
                    </h5>
                </header>
            </article>    
        @endforeach
    </div>        
</div>