<div class="tm-main-content no-pad-b">          
    <section class="row tm-item-preview">
        <div class="col-md-6 col-sm-12 mb-md-0 mb-5">
            <img src="{{ Storage::url($book->cover) }}" alt="Image" style="width: 98%" class="img-fluid tm-img-center-sm">
        </div>
        <div class="col-md-6 col-sm-12">
            <h2 class="tm-blue-text">{{ $book->title }}</h2>
            <small>
                @foreach ($book->authors as $author)
                    {{ $author->name }}
                @endforeach
            </small>
            <p class="tm-margin-b-p">
                {!! $book->content !!}
            </p>
            <p class="tm-blue-text tm-margin-b-s">Categorias: @foreach ( $book->categories as $categorie ) <a href="" class="btn btn-danger">{{ $categorie->name }}</a> @endforeach</p>
            <p class="tm-blue-text tm-margin-b-s">Etiquetas: @foreach ( $book->tags as $tag ) <a href="" class="btn btn-danger">{{ $tag->name }}</a> @endforeach</p>
            <p class="tm-blue-text tm-margin-b">Valoracion: @for ($i = 0; $i < 5; $i++) <img src="{{ asset('img/star.png')}}" alt="Star image"> @endfor</p>
            <a href="{{ Storage::url($book->url) }}" target="_blank" class="tm-btn tm-btn-gray tm-margin-r-20 tm-margin-b-s">Ver Libro</a>
        </div>
    </section>
    <div class="tm-gallery no-pad-b">
        <h2>Libros Recomendados</h2>
        <div class="row">
            @foreach ($books as $libro)
                <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item mb-5">
                    <a href="{{ route('show_book',$libro->id) }}">
                        <div class="tm-gallery-item-overlay">
                            <img src="{{ $libro->cover }}" alt="Image" class="img-fluid tm-img-center">
                        </div>
                        <p class="tm-figcaption no-pad-b">{{ $libro->title }}</p>
                    </a>
                </figure>
            @endforeach
        </div>   
    </div>                    
                
</div>