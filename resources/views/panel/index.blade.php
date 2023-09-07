@extends('layouts.base')
@section('cuerpo')
<div class="tm-main-content">                    
    <section class="row tm-item-preview">
        <div class="col-12">
            <h2 class="tm-blue-text tm-margin-b-p text-center">Panel de Estudiante.</h2>
        </div>
    </section>
    <div class="row tm-margin-b-ll">
        <div class="col-sm-12 ">
                <!-- Nav pills -->
                <ul class="nav nav-pills">
                    <li class="nav-item pr-2">
                        <a class="nav-link active" data-toggle="pill" href="#home">
                            <i class="fa fa-id-card-o fa-x6 d-block text-center display-5" aria-hidden="true"></i>
                            Datos Estudiante
                        </a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" data-toggle="pill" href="#menu1">
                            <i class="fa fa-book d-block text-center display-5" aria-hidden="true"></i>
                            Libros Vistos
                        </a>
                    </li>
                </ul>
        </div>
        <div class="col-sm-12">       
                <!-- Tab panes -->
                <div class="tab-content mt-3">
                    <div class="tab-pane container active" id="home">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        {{ Auth::user()->name }}
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="tab-pane container fade" id="menu1">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Lista</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Titulo</th>
                                                        <th>Autor</th>
                                                        <th>Fecha</th>
                                                        <th>Hora</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($views as $view)
                                                        <tr>
                                                            <td>{{ $view->book->title }}</td>
                                                            <td>
                                                                @foreach ($view->book->authors as $author)
                                                                    {{ $author->name }} @if(!$loop->last), @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                {{ date('d-m-Y',strtotime($view->date)) }}
                                                            </td>
                                                            <td>
                                                                {{ $view->time }}
                                                            </td>
                                                            <td style="width: 50px">
                                                                <a href="{{ route('show_book',$view->book->id) }}" class="btn btn-info">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i> Mostrar
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p>Lista de libros visitados en las ultimo semestre.</p>
                                    </div>
                                </div>                                
                            </div>
                        </div>                        
                    </div>
                </div>
        </div>
    </div>
  <!-- Tabs content -->
        {{-- @foreach ($programas as $programa)
            <article class="col-12 col-sm-12 col-md-4 col-lg-4 mb-md-0 mb-5">
                <p class="mb-2">
                    <a href="{{ route('show_book_programas',$programa->idCarrera) }}"class="btn btn-info">
                        <i class="fa fa-eye" aria-hidden="true"></i> ver
                    </a>
                </p>
                <div class="text-center tm-margin-b-30"><i class="fa tm-fa-6x {{ $programa->icon }} tm-blue-text"></i></div>
                <header class="tm-margin-b-30">
                    <h5 class="tm-blue-text tm-h5 text-center">
                        <a href="{{ route('show_book_programas',$programa->idCarrera) }}">{{ $programa->nombreCarrera }}</a>
                    </h5>
                </header>
            </article>    
        @endforeach --}}
    </div>        
</div>
@stop