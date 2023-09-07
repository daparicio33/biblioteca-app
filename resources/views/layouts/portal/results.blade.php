<section class="media tm-highlight tm-highlight-w-icon mt-3">
    <div class="tm-highlight-icon">
        <i class="fa tm-fa-6x fa fa-search"></i>    
    </div>                    
    <div class="media-body">
        <header>
            <h2>Resultados</h2>
        </header>
        <p class="tm-margin-b">
            <ol>
                @if (count($books)==0)
                    <p class="text-white"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> No se encontraron resultados .....</p>
                @else
                    @foreach ($books as $book)
                        <li>
                            <a href="{{ route('show_book',$book->id) }}" class="text-white">
                            Título: {{ $book->title }} - Año: {{ $book->publisher_date }} - Páginas: {{ $book->pages }}
                            </a>
                        </li>
                    @endforeach    
                @endif
            </ol>
        </p>
        <a href="{{ route('index') }}" class="tm-white-bordered-btn">Regresar</a>
    </div>                    
</section>