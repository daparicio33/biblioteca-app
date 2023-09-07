@extends('layouts.base')
@section('cuerpo')
<div class="tm-main-content">                    
    <section class="row tm-item-preview tm-margin-b-xl">
        <div class="col-12">
            <h2 class="tm-blue-text tm-margin-b-p text-center">Catálogo de Libros por Categorias</h2>
        </div>
    </section>
    <div class="row tm-margin-b-ll">
        @foreach ($categories as $categorie)
            <article class="col-12 col-sm-12 col-md-4 col-lg-4 mb-md-0 mb-5">
                <p class="mb-2">
                </p>
                <div class="text-center tm-margin-b-30"><i class="fa tm-fa-6x fa fa-list-ol tm-blue-text"></i></div>
                <header class="tm-margin-b-30">
                    <h5 class="tm-blue-text tm-h5 text-center">
                        <a class="btn btn-danger" href="{{ route('show_book_categorias',$categorie->id) }}">{{ $categorie->name }}</a>
                    </h5>
                </header>
            </article>    
        @endforeach
    </div>        
</div>
@stop