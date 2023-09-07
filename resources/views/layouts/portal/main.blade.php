<div class="tm-main-content">
    <section class="tm-margin-b-l">
        <header>
            <h2 class="tm-main-title">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i> Bienvenido a nuestra biblioteca
            </h2>
        </header>
        <p>Descubre un mundo de conocimiento en nuestra biblioteca en línea. Encuentra libros electrónicos,
             revistas y recursos multimedia en diversas categorías. Únete a eventos y clubes de lectura virtuales. Explora, 
             aprende y sumérgete en la lectura con nosotros. ¡Bienvenido!</p>
        <div class="tm-gallery">
            <div class="row">
                @foreach ($books as $book)
                    <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                        <a href="{{ route('show_book',$book->id) }}">
                            <div class="tm-gallery-item-overlay">
                                <img src="{{ Storage::url($book->cover) }}" alt="Image" class="img-fluid tm-img-center">
                            </div>

                            <p class="tm-figcaption">{{ $book->title }}</p>
                        </a>
                    </figure>
                @endforeach
            </div>
            
        </div>
        {{-- php artisan vendor:publish --tag=laravel-pagination --}}
        <div class="row">
            {{ $books->links() }}
        </div>

        
    </section>

    <section class="media tm-highlight tm-highlight-w-icon bg-info">

        <div class="tm-highlight-icon">
            <i class="fa tm-fa-6x fa fa-whatsapp"></i>
        </div>

        <div class="media-body">
            <header>
                <h2>Necesitas Ayuda?</h2>
            </header>
            <p class="tm-margin-b">Estamos aquí para ayudarlos en cada paso del camino. 
                Si tienen alguna pregunta o necesitan asistencia, no duden en ponerse en contacto con nosotros. 
                Hagan clic en el siguiente enlace para encontrar la ayuda que necesitas:</p>
            <a href="" class="tm-white-bordered-btn btn btn-success">WhatsApp</a>
        </div>
    </section>
</div>