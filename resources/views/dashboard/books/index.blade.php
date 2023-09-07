@extends('adminlte::page')

@section('title', 'Dashboard Libros')

@section('content_header')
    <h1>Libros</h1>
    <a href="{{ route('dashboard.books.create') }}" class="btn btn-success">
        <i class="fa fa-book"></i> Nuevo Libro
    </a>
@stop

@section('content')
    <p>Lista de Libros Registrados en el sistema.</p>
    <table class="table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Programa de Estudios</th>
                <th>Etiquetas</th>
                <th>Categorias</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book )
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>
                        @foreach ($book->authors  as $author)
                            {{ $author->name }}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($book->programas as $programa)
                            {{ $programa->nombreCarrera }}@if(!$loop->last),@endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($book->tags  as $tag)
                            {{ $tag->name }}@if(!$loop->last),@endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($book->categories  as $categorie)
                            {{ $categorie->name }}@if(!$loop->last),@endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('dashboard.books.edit',$book->id) }}" class="btn btn-success m-1">
                            <i class="far fa-edit"></i>
                        </a>
                        <a class="btn btn-danger m-1" data-toggle="modal" data-target="#modal-delete-{{ $book->id }}">
                            <i class="far fa-trash-alt"></i>
                        </a>
                        @include('dashboard.books.modal')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop


@section('js')

    @if(session('info'))
    @php
        $message1 = session('info');
    @endphp
    <script> 
        toastr.options  = {
            "progressBar" : true,
            }
            toastr.success('{{ $message1 }}');
    </script>
    @endif
    @if (session('error'))
    @php
        $message2 = session('error');
    @endphp
    <script> 
        toastr.options  = {
            "progressBar" : true,
            }
            toastr.error('{{ $message2 }}');
    </script>
    @endif

    



@stop