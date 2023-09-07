@extends('layouts.base')
@section('cuerpo')
<section class="media tm-highlight tm-highlight-w-icon mt-3">
    <div class="tm-highlight-icon">
        <i class="fa tm-fa-6x {{ $programa->icon }}"></i>    
    </div>                    
    <div class="media-body">
        <header>
            <h2>{{ $programa->nombreCarrera }}</h2>
        </header>
        <p class="tm-margin-b">
            <ol>
                @foreach ($books as $book)
                    <li>
                        <a href="{{ route('show_book',$book->id) }}" class="text-white">
                           Título: {{ $book->title }} - Año: {{ $book->publisher_date }} - Páginas: {{ $book->pages }}
                        </a>
                    </li>
                @endforeach
            </ol>
        </p>
        <a href="{{ route('programas') }}" class="tm-white-bordered-btn">Regresar</a>
    </div>                    
</section>
@stop